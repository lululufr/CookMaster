<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipates;
use App\Models\EventTags;
use App\Models\Rooms;
use App\Models\Utensils;
use App\Models\UtensilEventUses;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function createEvent(){

        return view('events.create_event');
    }
    public function createPrivateEvent(){

        return view('events.private_event');
    }
    public function createEventApply(Request $request)
    {
        $roomId = intval($request['room']);
        $start = Carbon::parse($request['start'])->format('Y-m-d H:i:s');
        $duration = intval($request['duration']);
        // Calcul de la date de fin en ajoutant la durée à la date de début
        $end = Carbon::parse($start)->addHours($duration)->format('Y-m-d H:i:s');

        // Vérification si la salle est déjà utilisée pendant la période spécifiée
        $existingEvent = Event::where('room_id', $request['room'])
            ->where(function ($query) use ($start, $end) {
                $query->where(function ($q) use ($start, $end) {
                    $q->where('start', '>=', $start)
                        ->where('start', '<', $end);
                })->orWhere(function ($q) use ($start, $end) {
                    $q->where('start', '<=', $start)
                        ->whereRaw('start + INTERVAL duration HOUR > ?', [$start]);
                });
            })
            ->first();
        if ($existingEvent) {
            return back()->with('message', 'La salle est déjà réservée pendant cette période.');
        }
        $event = new Event;
        $event->title = htmlspecialchars($request['title']);
        $event->start = $start;
        $event->description = htmlspecialchars($request['description']);

        $event->room_id = $roomId != 0  ? $roomId : null;
        $event->duration = $duration == 0 ? 2 : $duration;
        $event->max_participants = intval($request['max_participants']);
        if($request['chef_username'] != null && $request['chef_username'] != 'null'){
            $event->chef_username = htmlspecialchars($request['chef_username']);
        }
        $event->recipe_id = intval($request['lesson']);
        $event->save();
        $i=0;
        $tags = $request->input('tags');
        if ($tags !== null) {
            if($tags == 'private'){
                $event_tag = new EventTags;
                $event_tag->tag_name = 'private';
                $event_tag->event_id = $event->id;
                $event_tag->save();

                $user_participate = new EventParticipates;
                $user_participate->event_id = $event->id;
                $user_participate->user_id = auth()->id();
                $user_participate->save();
            }else {
                foreach ($request->input('tags') as $tag) {
                    $event_tag = new EventTags;
                    $event_tag->tag_name = $tag;
                    $event_tag->event_id = $event->id;
                    $event_tag->save();
                    ++$i;
                }
            }
        }

        $i=0;
        if (isset($request['utensils'])) {
            foreach ($request['utensils'] as $utensil) {
                if($this->utensilAvailable($utensil, Carbon::parse($start)->toDateString()) <= 0){
                    UtensilEventUses::where('event_id', $event->id)->delete();
                    $event->delete();
                    return back()->with('message', 'Il n\'y a pas assez d\'ustensiles disponibles pour cette date.');
                }
                $utensilsEvent = new UtensilEventUses;

                $usedUtensilIds = UtensilEventUses::whereDate('date', Carbon::parse($start)->toDateString())->pluck('utensil_id')->toArray();
                $utensilId = Utensils::whereNotIn('id', $usedUtensilIds)
                    ->where('type', $utensil)
                    ->first();
                $utensilsEvent->utensil_id = $utensilId->id;
                $utensilsEvent->event_id = $event->id;
                $utensilsEvent->date = Carbon::parse($start)->toDate();
                $utensilsEvent->save();
                ++$i;
            }
        }

        return back();
    }




    public function deleteEvent($id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        $event->delete();
        return back();
    }
    public function participate(Request $request)
    {
        $eventId = $request['event_id'];
        $userId = $request['user_id'];

        $existingParticipation = EventParticipates::where('event_id', $eventId)
            ->where('user_id', $userId)
            ->first();
        $participantCount = EventParticipates::where('event_id', $eventId)->count();
        if($participantCount > Event::where('id', $eventId)->first()->max_participants){
            return back()->with('message', 'The event is full.');
        }
        if ($existingParticipation ) {
            $existingParticipation->delete();
            return back();
        }

        $eventParticipate = new EventParticipates;
        $eventParticipate->event_id = $eventId;
        $eventParticipate->user_id = $userId;
        $eventParticipate->save();

        return back();
    }
    public function changeValidationStatus(Request $request){
        Event::where('id', $request->id)->update(['is_validated' => Event::where('id', $request->id)->first()->is_validated ? 0 : 1]);
        return back();
    }

    public function utensilAvailable($type, $when){
        return Utensils::countByType($type) - UtensilEventUses::countUses($type, $when);
    }

    public function get_all_events(){
        return view('admin.admin_events', ['events' => Event::all()]);
    }
}

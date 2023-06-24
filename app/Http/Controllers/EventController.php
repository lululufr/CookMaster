<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipates;
use App\Models\Rooms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function createEvent(){

        return view('events.create_event');
    }
    public function createEventApply(Request $request)
    {
        $roomId = intval($request['room']);
        $start = Carbon::parse($request['start'])->format('Y-m-d H:i:s');
        $duration = intval($request['duration']);


        // Calcul de la date de fin en ajoutant la durée à la date de début
        $end = Carbon::parse($start)->addHours($duration)->format('Y-m-d H:i:s');

        // Vérification si la salle est déjà utilisée pendant la période spécifiée
        $existingEvent = Event::where('rooms_id', $request['room'])
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
            // La salle est déjà utilisée pendant la période spécifiée, affichez un message d'erreur ou effectuez une action appropriée
            return back()->with('error', 'La salle est déjà réservée pendant cette période.');
        }

        // Création de l'événement car la salle est disponible
        $event = new Event;
        $event->title = htmlspecialchars($request['title']);
        $event->start = $start;
        $event->description = htmlspecialchars($request['description']);
        $event->rooms_id = $roomId;
        $event->duration = $duration;
        $event->tags = htmlspecialchars($request['tags']);
        $event->max_participants = intval($request['max_participants']);
        $event->chef_username = htmlspecialchars($request['chef_username']);
        $event->recipes_id = intval($request['lesson']);
        $event->save();

        return redirect('/');
    }

    public function modifyEvent(){

        return view('event.modify_event');
    }
    public function modifyEventApply($id, Request $request){

        $event = Event::where('id', $id)->firstOrFail();

        switch ($request->input('table')) {
            case 'username':
                $event->username = $request->input('new_content');
                break;
            case 'firstname':
                $event->firstname = $request->input('new_content');
                break;
            case 'lastname':
                $event->lastname = $request->input('new_content');
                break;
            case 'email':
                $event->email = $request->input('new_content');
                break;
            case 'role':
                $event->role = $request->input('new_content');
                break;
            case 'buying_plan':
                $event->buying_plan = $request->input('new_content');
                break;

            //case 'password':
            //$user->username = $request->input('new_content');
            //break;

        }
    }
    public function participate(Request $request)
    {
        $eventId = $request['event_id'];
        $userId = $request['user_id'];

        $existingParticipation = EventParticipates::where('events_id', $eventId)
            ->where('users_id', $userId)
            ->first();
        $participantCount = EventParticipates::where('events_id', $eventId)->count();
        if($participantCount >= Event::where('id', $eventId)->first()->max_participants){
            return back()->with('error', 'The event is full.');
        }
        if ($existingParticipation ) {
            $existingParticipation->delete();
            return back();
        }

        $eventParticipate = new EventParticipates;
        $eventParticipate->events_id = $eventId;
        $eventParticipate->users_id = $userId;
        $eventParticipate->save();

        return back();
    }

}

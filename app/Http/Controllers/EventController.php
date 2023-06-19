<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        $event = new Event;
        $event->title = htmlspecialchars($request['title']);
        $event->start = Carbon::parse($request['start'])->format('Y-m-d H:i:s');
        $event->description = htmlspecialchars($request['description']);
        $event->rooms_id = intval($request['room']);
        $event->duration = intval($request['duration']);
        $event->tags = htmlspecialchars($request['tags']);

        /*$isRoomAvailable = $this->isRoomAvailable($event->rooms_id, $event->start, $event->duration);
        if (!$isRoomAvailable) {
            return redirect()->back()->with('error', 'The room is not available at the specified date and time.');
        }*/
        $event->save();
        return redirect('/');
    }
    /*private function isRoomAvailable($roomId, $startDateTime, $duration)
    {
        $startDateTime = Carbon::parse($startDateTime);
        $endDateTime = $startDateTime->copy()->addMinutes($duration);

        $eventsCount = Event::where('rooms_id', $roomId)
            ->where(function ($query) use ($startDateTime, $endDateTime) {
                $query->where(function ($query) use ($startDateTime, $endDateTime) {
                    $query->where('start', '>=', $startDateTime)
                        ->where('start', '<', $endDateTime);
                })->orWhere(function ($query) use ($startDateTime, $endDateTime) {
                    $query->where('start', '<=', $startDateTime)
                        ->whereRaw("DATE_ADD(start, INTERVAL duration MINUTE) > ?", [$startDateTime]);
                });
            })
            ->count();

        return $eventsCount === 0;
    }*/

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
}

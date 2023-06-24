<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipates;
use App\Models\Rooms;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function api_event_get()
    {
        $events = Event::all()->toArray();
        $eventIds = array_column($events, 'id');

        $rooms = Rooms::whereIn('id', array_column($events, 'rooms_id'))->get()->toArray();//select * from Rooms where id=$rooms_id in $events


        //SELECT events_id, COUNT() as participate_count FROM event_participates WHERE events_id IN (...) GROUP BY events_id
        $participateCounts = EventParticipates::whereIn('events_id', $eventIds)
            ->select('events_id', DB::raw('count() as participate_count'))
            ->groupBy('events_id')
            ->pluck('participate_count', 'events_id')
            ->toArray();

        foreach ($events as &$event) {
            $eventId = $event['id'];
            $event['participate_count'] = isset($participateCounts[$eventId]) ? $participateCounts[$eventId] : 0;

            $roomId = $event['rooms_id'];
            $event['room'] =$rooms[$roomId];
        }

        return response()->json([
            'events' => $events
        ], 200);
    }


}

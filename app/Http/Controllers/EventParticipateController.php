<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipates;
use Illuminate\Http\Request;

class EventParticipateController extends Controller
{
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


        // L'utilisateur ne participe pas encore à cet événement
        // Ajouter la participation à la table EventParticipates
        $eventParticipate = new EventParticipates;
        $eventParticipate->events_id = $eventId;
        $eventParticipate->users_id = $userId;
        $eventParticipate->save();

        return back();
    }
}

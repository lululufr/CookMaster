<?php

namespace App\Http\Controllers;

use App\Models\EventParticipates;
use Illuminate\Http\Request;

class EventParticipateController extends Controller
{
    public function participate(Request $request)
    {
        $eventParticipate = new EventParticipates;
        $eventParticipate->events_id = $request['event_id'];
        $eventParticipate->users_id = $request['user_id'];
        $eventParticipate->save();
        return redirect('/');
    }
}

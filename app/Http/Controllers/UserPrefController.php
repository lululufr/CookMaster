<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Event;
use App\Models\EventParticipates;
use App\Models\Hasclasses;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserPrefController extends Controller
{
    public function index()
    {

        $formations = Classes::where('chef_id', auth()->user()->id)->get();

        $ownformations = hasclasses::where('user_id', auth()->user()->id)->get();



        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();
        $eventids = EventParticipates::where('users_id', auth()->id())
            ->get('events_id')
            ->toArray();
        $events = Event::whereIn('id', $eventids)->whereBetween('start', [$startDate, $endDate])->get()->toArray();

        return view('users.user-pref')
            ->with('formations', $formations)
            ->with('ownformations', $ownformations)
            ->with('events',$events);
    }
}

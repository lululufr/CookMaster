<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function getEvent(){

        $events = Event::all();

        return view('calendar.fullcalendar', compact('events'));

    }
    public function createEvent(Request $request){
        $data = array_except($request->all(), ['_token']);
        $events = Event::insert($data);
        return response()->json($events);
    }

    public function deleteEvent(Request $request){
        $event = Event::find($request->id);
        return $event->delete();
    }
}

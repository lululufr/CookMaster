<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function getEvent(Request $request)
    {

        $events = [];

        $startDate = Carbon::now()->startOfWeek();

        $endDate = Carbon::now()->endOfWeek();



        if ($request != null) {
            $events = Event::where('title', $request['rech'])
                ->whereBetween('start', [$startDate, $endDate])
                ->where('rooms_id', $request['rooms'])
                ->get()
                ->toArray();

            $events += Event::where('tags', $request['rech'])
                ->whereBetween('start', [$startDate, $endDate])
                ->where('rooms_id', $request['rooms'])
                ->get()
                ->toArray();

            $events += Event::where('description', 'LIKE', '%' . $request['rech'] . '%')
                ->whereBetween('start', [$startDate, $endDate])
                ->where('rooms_id', $request['rooms'])
                ->get()
                ->toArray();


        }
        /*if($request['rooms'] != null) {


            $events += Event::where('rooms_id', $request['rooms'])
                ->whereBetween('start', [$startDate, $endDate])
                ->get()
                ->toArray();


        }*/else{

            $events = Event::whereBetween('start', [$startDate, $endDate])->get()->toArray();

        }


        return view('calendar.fullcalendar')->with(compact('events'));

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

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
                ->where('is_validated', 1)
                ->get()
                ->toArray();

            $events += Event::where('tags', $request['rech'])
                ->whereBetween('start', [$startDate, $endDate])
                ->where('rooms_id', $request['rooms'])
                ->where('is_validated', 1)
                ->get()
                ->toArray();

            $events += Event::where('description', 'LIKE', '%' . $request['rech'] . '%')
                ->whereBetween('start', [$startDate, $endDate])
                ->where('rooms_id', $request['rooms'])
                ->where('is_validated', 1)
                ->get()
                ->toArray();


        }else{

            $events = Event::whereBetween('start', [$startDate, $endDate])->get()->toArray();

        }
        //dd($events);
        return view('calendar.fullcalendar')->with(compact('events'));

    }

    public function chefgetEvents(Request $request)
    {

        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();
        $events = Event::where('chef_username', auth()->user()->username)
            ->whereBetween('start', [$startDate, $endDate])
            ->get()
            ->toArray();


        return view('admin.admin_chef_calendar')->with(compact('events'));

    }

    public function changeValidationStatus(Request $request){
        Event::where('id', $request->id)->update(['is_validated' => Event::where('id', $request->id)->first()->is_validated ? 0 : 1]);
        return back();
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

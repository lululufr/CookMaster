<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show_message_page(int $id)
    {

        $messages = Messages::query()->orWhere('from_id', $id)->orWhere('to_id', $id)->limit(20)->get();



       return view('message.message_page')->with('messages', $messages)->with('id', $id);
    }

    public function show_messages(Request $request)
    {
        $message =  $request['message'];

        echo $message;
    }

    public function send_messages(Request $request, int $id)
    {
        $message =  $request['message'];

        $entry = new Messages();
        $entry->to_id = $id;
        $entry->from_id = auth()->user()->id;
        $entry->content = $message;
        $entry->save();

        return redirect('/message/'.$id);

    }


}

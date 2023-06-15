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

    public function show_conversation()
    {

        $messages = Messages::where('to_id', auth()->user()->id)->orWhere('from_id', auth()->user()->id)->get();

        $conversation = array();

        foreach ($messages as $message) {
            if ($message->from_in in $conversation) {

            }else {


            }
        }

        return view('message.conversation')->with('messages', $messages);
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

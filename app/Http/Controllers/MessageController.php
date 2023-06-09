<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show_message_page(int $id)
    {

        $messages = Messages::where('to_id', $id)->orderBy('created_at', 'desc')->get();
        //where('to_id',auth()->user()->id)->limit(30)



       return view('message.message_page')->with('messages', $messages);
    }

    public function show_messages(Request $request)
    {
        $message =  $request['message'];

        echo $message;
    }
}

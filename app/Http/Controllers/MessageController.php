<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show_message_page()
    {
       return view('message/message_page');
    }

    public function show_messages(Request $request)
    {
        $message =  $request['message'];

        echo $message;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show_message_page(int $id)
    {

        $loggedInUserId = auth()->user()->id;

        $messages = Messages::where(function ($query) use ($loggedInUserId, $id) {
            $query->where('from_id', $loggedInUserId)
                ->where('to_id', $id);
        })->orWhere(function ($query) use ($loggedInUserId, $id) {
            $query->where('from_id', $id)
                ->where('to_id', $loggedInUserId);
        })->get();

        return view('message.message_page')->with('messages', $messages)->with('id', $id);
    }

    public function show_conversation()
    {

        $messages = Messages::where('to_id', auth()->user()->id)->orWhere('from_id', auth()->user()->id)->get();

        $conversation = array();

        foreach ($messages as $message) {
            if (!in_array($message->from_id,$conversation) && $message->from_id != auth()->user()->id) {
                array_push($conversation, $message->from_id);
            }
            if (!in_array($message->to_id,$conversation) && $message->to_id != auth()->user()->id) {
                array_push($conversation, $message->to_id);
            }

        }


        $convs = User::whereIn('id', $conversation)->get();

        return view('message.conversation')->with('convs', $convs);
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

<?php

namespace App\Http\Controllers;

use App\Models\ContainsIngredients;
use App\Models\Event;
use App\Models\EventParticipates;
use App\Models\Messages;
use App\Models\Recipes;
use App\Models\RecipeTags;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function api_event_get()
    {
        $events = Event::with(['rooms', 'users_count'])->get();

        foreach ($events as $event) {
            $event->rooms;
            $event->users_count;
        }
        return response()->json([
            'events' => $events
        ], 200);
    }

    public function api_recipe_get(){
        $recipes = Recipes::with('tags', 'ingredients')->get();

        return response()->json([
            'recipes' => $recipes
        ], 200);
    }

    public function api_message_get(int $id){

        $loggedInUserId = auth()->user()->id;

        $messages = Messages::where(function ($query) use ($loggedInUserId, $id) {
            $query->where('from_id', $loggedInUserId)
                ->where('to_id', $id);
        })->orWhere(function ($query) use ($loggedInUserId, $id) {
            $query->where('from_id', $id)
                ->where('to_id', $loggedInUserId);
        })->get();


        return response()->json([
            'messages' => $messages
        ], 200);
    }

    public function api_conversation_get(){


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


        return response()->json([
            '$convs' => $convs
        ], 200);
    }

    public function api_send_messages(Request $request, int $id)
    {
        $message =  $request['message'];

        $entry = new Messages();
        $entry->to_id = $id;
        $entry->from_id = auth()->user()->id;
        $entry->content = $message;
        $entry->save();

    }


    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

    public function api_connexion(Request $request)
    {
        $formFields = $request->validate([
            'username'=> ['required'],
            'password'=> 'required'
        ]);

        if (Auth::attempt($formFields)) {
            $user = Auth::user();
            $token = $user->createToken('MobileAppToken')->plainTextToken;

            return json_encode(['success' => true, 'token' => $token]);
        }

        return json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }




//récupérer id utilisateur + son type


}

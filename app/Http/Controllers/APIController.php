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
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class APIController extends Controller
{
    public function api_event_get(Request $request)
    {
        if($this->is_connected($request->bearerToken())) {
            $events = Event::with(['rooms', 'users_count'])->where('is_validated', 1)->get();

            foreach ($events as $event) {
                $event->rooms;
                $event->users_count;
            }
            return response()->json([
                'events' => $events
            ], 200);
        }
        return response()->json([
            'message' => 'Bad credentials'
        ], 401);
    }

    public function api_recipe_get(Request $request){

        if($this->is_connected($request->bearerToken())) {
            $recipes = Recipes::with('tags', 'ingredients')->get();
            return response()->json([
                'recipes' => $recipes
            ], 200);
        }
        return response()->json([
            'message' => 'Bad credentials'
        ], 401);
    }

    public function api_message_get(Request $request, int $id){

        if($user = User::where('mobile_token', $request->bearerToken())->select('id','username','profil_picture')->first()){



            $messages = Messages::where('from_id', $user->id)->orWhere('to_id', $id)->get();

            //a variable containing all message information and username, id and profil_pic from the sender of the message
            //$messages = Messages::with('from_id')->where('from_id', $user->id)->orWhere('to_id', $id)->get();

            return response()->json([
                'messages' => $messages,
            ], 200);
        }
        return response()->json([
            'message' => 'Bad credentials'
        ], 401);
    }

    public function api_conversation_get(Request $request){
        if($user = User::where('mobile_token', $request->bearerToken())->first()){
            $messages = Messages::where('to_id', $user->id)->orWhere('from_id', $user->id)->get();
            $conversation = array();

            foreach ($messages as $message) {
                if (!in_array($message->from_id, $conversation) && $message->from_id != $user->id) {
                    array_push($conversation, $message->from_id);
                }
                if (!in_array($message->to_id, $conversation) && $message->to_id != $user->id) {
                    array_push($conversation, $message->to_id);
                }
            }
            $convs = User::whereIn('id', $conversation)->select('id','username','profil_picture')->get();
//username id pdp
            return response()->json([
                'convs' => $convs,
                'username' => $user->username,
                'profil_picture' => $user->profil_picture
            ], 200);
        }
        return response()->json([
            'message' => 'Bad credentials'
        ], 401);
    }

    public function api_send_messages(Request $request, int $id)
    {
        if($user = User::where('mobile_token', $request->bearerToken())->first()) {
            $message = $request['message'];

            $entry = new Messages();
            $entry->to_id = $id;
            $entry->from_id = $user->id ;
            $entry->content = $message;
            $entry->save();
        }
        return response()->json([
            'message' => 'Bad credentials'
        ], 401);
    }




    public function api_connexion(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user || !password_verify($request->password, $user->password)) {
            return response()->json([
                'message' => 'Bad credentials'
            ], 401);
        }
        if($user->buying_plan_expiration_date > today()){
            $user->buying_plan = 'free';
        }
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $token = substr(str_shuffle($characters), 0, 16) ;
        $user->mobile_token = $token;
        $user->save();
        return response()->json([
            'token' => $token,
            'role' => $user->role,
            'id' => $user->id
        ], 200);
    }

//récupérer id utilisateur + son type



    public function api_show_conversation()
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

        return response()->json([
            'convs' => $convs
        ], 200);
    }


    public function is_connected($token){
        $user = User::where('mobile_token', $token)->first();
        if($user){
            return true;
        }
        return false;
    }
}

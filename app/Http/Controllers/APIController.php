<?php

namespace App\Http\Controllers;

use App\Models\ContainsIngredients;
use App\Models\Event;
use App\Models\EventParticipates;
use App\Models\Recipes;
use App\Models\RecipeTags;
use App\Models\Rooms;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function api_event_get()
    {
        $events = Event::with(['rooms', 'users_count'])
            ->get();

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
}

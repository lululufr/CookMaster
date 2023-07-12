<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    public $isParticipating;
    public function rooms(): BelongsTo
    {
        $room = $this->belongsTo(Rooms::class, 'room_id');
        //dd($room);
        return $room;
    }
    public function isParticipating($user_id): bool
    {
        $participate = EventParticipates::where('user_id', $user_id)->where('event_id', $this->id)->first();
        return $participate != null;
    }

    public function recipes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Recipes::class, 'recipe_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'event_tags', 'event_id', 'tag_name');
    }
}

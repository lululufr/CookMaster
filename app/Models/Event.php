<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    public function rooms() : BelongsTo
    {
        return $this->belongsTo(Rooms::class);
    }

    public function users_count()
    {
        return $this->hasMany(EventParticipates::class,'event_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'event_tags', 'event_id', 'tag_name');
    }
}

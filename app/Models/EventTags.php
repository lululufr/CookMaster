<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTags extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Messages extends Model
{
    use HasFactory;

    public function user_from(): BelongsTo
    {

        return $this->belongsTo(User::class, 'from_id');
    }

    public function user_to(): BelongsTo
    {

        return $this->belongsTo(User::class, 'to_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapters extends Model
{
    use HasFactory;

    public function classes(): BelongsTo
    {

        return $this->belongsTo(Classes::class, 'classes_id');
    }
}

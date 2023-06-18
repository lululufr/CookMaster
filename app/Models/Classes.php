<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classes extends Model
{
    use HasFactory;

    public function chef(): BelongsTo
    {

        return $this->belongsTo(User::class, 'chef_id');
    }
}

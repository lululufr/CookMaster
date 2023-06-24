<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeTags extends Model
{
    public function recipe()
    {
        return $this->belongsTo(Recipes::class, 'recipe_id');
    }
}

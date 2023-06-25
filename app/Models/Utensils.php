<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utensils extends Model
{

    public static function countByType($type)
    {
        return Utensils::where('type', $type)->count();
    }
}

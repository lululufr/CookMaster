<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtensilEventUses extends Model
{
        public static function countUses($type)
        {
            return UtensilEventUses::whereIn('utensil_id', Utensils::where('type',$type)->pluck('id'))->count();
        }
}

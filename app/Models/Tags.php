<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public $primaryKey = 'name';
    public $incrementing = false;
    public $keyType = 'string';
    use HasFactory;

}

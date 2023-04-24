<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //use HasFactory;


    public static function getall(){

    return [
        
            [
               'id' => 1,
               'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto odit placeat recusandae aut at asperiores! Tenetur, soluta consequuntur voluptatibus at consectetur explicabo eaque atque ex placeat nihil dignissimos, veniam quae.'
            ],
            [
               'id' => 2,
               'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto odit placeat recusandae aut at asperiores! Tenetur, soluta consequuntur voluptatibus at consectetur explicabo eaque atque ex placeat nihil dignissimos, veniam quae.'
            ]
   
         ];

    }


}

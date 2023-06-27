<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\PlanController;

class AdsController extends Controller
{

    public static function ads(): void
    {

        if(auth()->user()){
        $userplan = auth()->user()->buying_plan;
    }else{
        $userplan = 'free';
    }


        if ($userplan == 'free'){
            echo("

            <div class='card bg-base-300 justify-item-center'>
                <h1 class='card-title'>PUB</h1>
            </div>

            ");
        };
    }

}

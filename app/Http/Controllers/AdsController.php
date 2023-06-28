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
           <div class='flex items-center justify-center bg-base-300 p-4'>
                <div class='text-center'>
                    <h1 class='text-3xl font-bold mb-2'>PUBLICITÉ</h1>
                    <p class='text-lg text-gray-700'>Ne manquez pas notre offre spéciale !</p>
                    <p class='text-sm text-gray-500'>Offre valable jusqu'au 31 juillet.</p>
                <a href='#' class='text-blue-500 underline mt-4'>En savoir plus</a>
            </div>
        </div>
            ");
        };
    }

}

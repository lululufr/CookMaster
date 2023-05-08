<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SallesController extends Controller
{

    public function show_my_salle_page(){

        return view('salles.salle_page');
    }
}

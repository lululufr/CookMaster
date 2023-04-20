<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class connexionController extends Controller
{
    public function index(){

        $title = 'Cook Master';

        //return view('connexion',compact('title'));

        return view('connexion')->with('title',$title);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //formulaire d'inscription

    public function create()
    {
        return view('users.register');
    }

}

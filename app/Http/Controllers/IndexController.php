<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        if(auth()->user()){
            $posts = Posts::all()->sortByDesc('created_at')->take(10);
            return view('auth_welcome', ['posts' => $posts]);
        }
        else{
            return view('welcome');
        }

    }

}

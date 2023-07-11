<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        if(auth()->user()){
            $posts = Recipes::paginate(24);//->sortByDesc('created_at');
            return view('auth_welcome', ['posts' => $posts]);
        }
        else{
            return view('welcome');
        }

    }

}

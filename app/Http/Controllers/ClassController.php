<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{

    public function class_page()
    {

        $classes = Classes::all();



        return view('class.class-page')->with('classes', $classes);
    }


}

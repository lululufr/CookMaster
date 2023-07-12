<?php

namespace App\Http\Controllers;

use App\Models\Lives;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function index()
    {
        return view('live.choice');
    }

    public function list()
    {
        $lives = Lives::where('onlive',1)->get();
        return view('live.listing')->with('lives',$lives);
    }

    public function show($id)
    {
        $live = Lives::where('id',$id)->first();
        return view('live.live')->with('live',$live);
    }

}

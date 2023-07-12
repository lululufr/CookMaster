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

    public function register(Request $r)
    {
        $live = new Lives();
        $live->title = $r->titre;
        $live->link = $r->chaine;
        $live->user_id = auth()->user()->id;
        $live->onlive = 1;
        $live->save();
        return redirect('/live/list');
    }

    public function register_show()
    {
        return view('live.create');
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Hasclasses;
use Illuminate\Http\Request;

class UserPrefController extends Controller
{
    public function index()
    {

        $formations = Classes::where('chef_id', auth()->user()->id)->get();

        $ownformations = hasclasses::where('user_id', auth()->user()->id)->get();


        return view('users.user-pref')
            ->with('formations', $formations)
            ->with('ownformations', $ownformations);
    }
}

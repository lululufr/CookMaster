<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function show_page($username)
    {
        $infos = User::where('username', $username)->firstOrFail();

        return view('users.profil', ['infos' => $infos]);
    }
}




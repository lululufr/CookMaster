<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function show_profil_page($username)
    {
        $infos = User::where('username', $username)->firstOrFail();

        return view('users.profil', ['infos' => $infos]);
    }

    public function show_preference_page()
    {
        $infos = User::where('username', auth()->user()->username)->firstOrFail();

        return view('users.preference', ['infos' => $infos]);
    }


    public function change_preference(Request $request){

        User::where('username', auth()->user()->username)->update([
            'theme' => $request->theme,
            'langue' => $request->langue
        ]);

        redirect('/users/preferences')->with('message', 'Préférences modifiées avec succès !');

    }

}




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

        return view('users.profil', ['infos' => $infos]);
    }


    public function change_preference(Request $request){



        return redirect('/users/preferences')->with('message', 'Préférences modifiées avec succès !');

    }

    public function change_pp(Request $request, $id){

        $user = User::where('id', $id)->firstOrFail();

        if($request->hasFile('media')){
            $mediaPath = $request->file('media')->store('profile','public');
            $user->profil_picture = $mediaPath;
            $user->save();
        }


        return redirect('/users/preferences')->with('message', 'Préférences modifiées avec succès !');

    }

}




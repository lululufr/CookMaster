<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
    //formulaire d'inscription

    public function create()
    {
        return view('users.register');
    }


    //enregistrement du USER
    public function register(Request $request){

        $formFields = $request->validate([

            'username'=> ['required','min:3'],
            'email'=> ['required','email',Rule::unique('users','email')],
            'password'=> 'required|confirmed|min:6'



        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message','Inscription validé, vous etes connecté');


    }

    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','Vous etes deconnecté');
    }

    public function login(Request $request){


        $formFields = $request->validate([

            'username'=> ['required'],
            'password'=> 'required'
        ]);

        if (auth()->attempt($formFields)){

            $request->session()->regenerate();

            return redirect('/')->with('message','Vous etes connecté');
        }

       return back()->withErrors(['username' => 'Identifiants incorrect'])->onlyInput('username');

    }

}

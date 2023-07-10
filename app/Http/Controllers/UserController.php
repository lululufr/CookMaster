<?php

namespace App\Http\Controllers;

use App\Models\Cooptation;
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
            'lastname'=> 'required|min:2',
            'firstname'=> 'required|min:2',
            'username'=> ['required','min:3',Rule::unique('users','username')],
            'email'=> ['required','email',Rule::unique('users','email')],
            'password'=> 'required|confirmed|min:6'
        ]);
        //create user
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($formFields['password']);
        $user->save();
        //login
        auth()->login($user);

        if($request->input('cooptation') !== null){
            $coopter= User::where('username',$request->input('cooptation'))->first();
            if ($coopter !== null){
                $cooptation = new Cooptation();
                $cooptation->coopter_id = $coopter->id;
                $cooptation->coopted_id = $user->id;
                $cooptation->save();
            }else{
                return back()->withErrors(['cooptation' => 'Identifiant de cooptation incorrect'])->onlyInput('cooptation');
            }
        }
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

    public function login_page(){

        return view('users.login');

    }

}

<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Cooptation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

        $user->verify_token = rand(100000,999999);


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


        //email
        $data = [
            'name' => $user->firstname . ' ' . $user->lastname,
            'message' => 'Bonjour, bienvenue sur Cook With Me. Afin de vérifier votre compte veuillez cliquer sur ce lien : ' . url('/verify-account/'.$user->username.'?verify_token='. auth()->user()->verify_token),
        ];

        $mail = new MailNotify($data);

        Mail::to($user->email)->send($mail);


        return redirect('/')->with('message','Inscription validé, vous etes connecté, un email vous a été envoyé pour vérifier votre compte');


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


    public function verify_account(Request $request, $username)
    {
        $user = User::where('username', $username)->first();

        //echo "user : " . $user->username . "<br>";
        //echo "token : " . $user->verify_token . "<br>";
        //echo "token : " . $request->input('verify_token') . "<br>";

        if ($user->verify_token == $request->input('verify_token')) {
            $user->verify_token = 0;
            $user->save();
            return redirect('/')->with('message', 'Votre compte a été vérifié');
        }

        return redirect('/')->with('message', 'Impossible de vérifier votre compte');
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AdminController extends Controller
{
    public function show_admin_page()
    {
        return view('admin/admin_page');
    }

    public function delete_user($id)
    {
        User::where('id', $id)->delete();

        redirect('/admin')->with('success', 'User supprimé avec succes');

    }

    public function modify_user($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('/admin/modify_user',['user'=>$user]);
    }

    public function modify_user_apply($id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        $table = $request->input('table');


        switch ($table) {
            case 'username':
                $user->username = $request->input('new_content');
                break;
            case 'firstname':
                $user->firstname = $request->input('new_content');
                break;
            case 'lastname':
                $user->lastname = $request->input('new_content');
                break;
            case 'email':
                $user->email = $request->input('new_content');
                break;
            case 'role':
                $user->role = $request->input('new_content');
                break;
            case 'buying_plan':
                $user->buying_plan = $request->input('new_content');
                break;

            //case 'password':
            //$user->username = $request->input('new_content');
            //break;

        }

        $user->save();

        return view('/admin/modify_user',['user'=>$user]);
    }

}

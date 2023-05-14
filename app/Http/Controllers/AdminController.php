<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

}

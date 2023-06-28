<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrController extends Controller
{
    public function error_admin_redirect()
    {
        return view('error.youarenotadmin');
    }


    public function error_free_redirect()
    {
        return view('error.plan_depasse');
    }

}

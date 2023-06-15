<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function SearchUser(Request $request)
    {
        $query = $request->input('q');

        $users = User::where('username', 'like', '%' . $query . '%')->limit(10)->get();
        return response()->json($users);
    }
}

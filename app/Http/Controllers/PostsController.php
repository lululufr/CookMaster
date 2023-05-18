<?php

namespace App\Http\Controllers;


use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //

    public function show_post_page()
    {

    return view('post/post_page');

    }

    public function create(Request $request)
    {

        $post = new Posts;
        $post->content = htmlspecialchars($request['content']);
        $post->user_id = auth()->user()->id;
        $post->tags = htmlspecialchars($request['tags']);

// add more fields (all fields that users table contains without id)
        $post->save();
        return redirect('/');

    }
}

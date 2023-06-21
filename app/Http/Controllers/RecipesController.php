<?php

namespace App\Http\Controllers;


use App\Models\Articles;
use App\Models\Recipes;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    //

    public function show_recipe_page()
    {

    return view('recipe/recipe_page');

    }
    public function detailed_recipe_view($id){
        $article = Articles::where('id', $id)->firstOrFail();
        return view('recipe/detailed_view', ['article' => $article]);
    }

    public function create(Request $request)
    {

        $recipe = new Recipes;
        $recipe->user_id = auth()->id();
        $recipe->tags = $request['tags'];
        $recipe->content = $request['content'];
        $recipe->title = $request['title'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time().'.'.$extension;
            $file->move('uploads/recipe/', $filename);
            $recipe->image = $filename;
        }

        $recipe->save();
        return back();

    }
}


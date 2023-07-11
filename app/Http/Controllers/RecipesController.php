<?php

namespace App\Http\Controllers;


use App\Models\Articles;
use App\Models\ContainsIngredients;
use App\Models\RecipeComment;
use App\Models\RecipeTags;
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
        $recipe = Recipes::where('id', $id)->firstOrFail();
        return view('recipe/detailed_view', ['recipe' => $recipe]);
    }

    public function comment_send(Request $request, $id){


        $recipe_comment = new RecipeComment;
        $recipe_comment->content = $request['content'];
        $recipe_comment->recipe_id = $id;
        $recipe_comment->user_id = auth()->user()->id;
        $recipe_comment->save();


        return redirect("/recipe/".$id);
    }





    public function create(Request $request)
    {

        $recipe = new Recipes;
        $recipe->user_id = auth()->id();
        $recipe->content = $request['content'];
        $recipe->title = $request['title'];

        if($request->hasFile('image')){
            $mediaPath = $request->file('image')->store('recipes','public');
            $recipe->image = $mediaPath;
        }

        $recipe->save();

        $i=0;
        if (isset($request['ingredients'])) {
            foreach ($request['ingredients'] as $ingredient) {
                $contains_ingredient = new ContainsIngredients;
                $contains_ingredient->amount = $request['amount'][$i];
                $contains_ingredient->unit = $request['units'][$i];
                $contains_ingredient->ingredients_name = $ingredient;
                $contains_ingredient->recipes_id = $recipe->id;
                $contains_ingredient->save();
                ++$i;
            }
        }

        $i=0;
        if (isset($request['tags'])) {
            foreach ($request['tags'] as $tag) {
                $recipe_tag = new RecipeTags;
                $recipe_tag->tag_name = $tag;
                $recipe_tag->recipe_id = $recipe->id;
                $recipe_tag->save();
                ++$i;
            }
        }

        return back();

    }


}


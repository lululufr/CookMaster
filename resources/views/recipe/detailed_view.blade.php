<x-header/>

@php(\App\Http\Controllers\AdsController::ads())


<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <img src="{{asset("storage/".$recipe->image)}}" class="max-w-sm rounded-lg shadow-2xl" />
        <div>
            <h1 class="text-5xl font-bold">{{$recipe->title}}</h1>
            <p class="py-6">{{$recipe->content}}</p>

            <div class="card bg-primary text-primary-content m-1">
                <div class="card-body">
                    <h2 class="card-title">Ingrédient : </h2>
                    <div>
                        <ul>
            @foreach(\App\Models\ContainsIngredients::where('recipes_id',$recipe->id)->get() as $ingredient)
                                <li>{{$ingredient->amount}}{{$ingredient->unit}} de {{$ingredient->ingredients_name}}</li>
            @endforeach
                        </ul>
                    </div>
                    <div class="card-actions justify-end">

                    </div>
                </div>
            </div>


                <div class="card bg-primary text-primary-content m-1">
                    <div class="card-body">
                        <h2 class="card-title">Tags : </h2>
                        <div>
                            <ul>
                                @foreach(\App\Models\RecipeTags::where('recipe_id',$recipe->id)->get() as $tag)
                                    <li>{{$tag->tag_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-actions justify-end">

                        </div>
                    </div>
                </div>










            </div>
        </div>
    </div>
<div class="grid place-content-center place-item-center m-4">
    <!-- Commentaire -->
    <form method="POST" action="/recipe/comment/{{$recipe->id}}">
        @csrf
        <input type="text" name="content" class="input form-control" placeholder="Votre commentaire"/>
        <button class="btn btn-primary" type="submit">Commenter</button>
    </form>
</div>
    @foreach(\App\Models\RecipeComment::where('recipe_id',$recipe->id)->get() as $comment)

        <div class="alert shadow-lg m-4">
            <div class="avatar online">
                <div class="w-12 rounded-full">
                    <img src="{{asset("storage/".$comment->user->profil_picture)}}" />
                </div>
            </div>        <div>
                <h3 class="font-bold">{{$comment->user->username}}</h3>
                <div class="text-xs">{{$comment->content}}</div>
            </div>
        </div>

    @endforeach


<x-footer/>

<x-header/>

@php(\App\Http\Controllers\AdsController::ads())


<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <img src="{{asset("storage/".$recipe->image)}}" class="max-w-sm rounded-lg shadow-2xl" />
        <div>
            <h1 class="text-5xl font-bold">{{$recipe->title}}</h1>
            <p class="py-6">{{$recipe->content}}</p>

            @foreach(\App\Models\ContainsIngredients::where('recipes_id',$recipe->id)->get() as $ingredient)
                <div>
                    <p>{{$ingredient->id}}</p>
                    <p>{{$ingredient->id}}</p>
                    <p>{{$ingredient->id}}</p>


                </div>
            @endforeach


        </div>
    </div>
</div>



<x-footer/>

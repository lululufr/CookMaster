<x-header/>

<h2 class="text-2xl font-bold py-2 text-center">La COOK Boutique</h2>

<div class="grid grid-rows-4 grid-flow-col gap-4">

    @foreach(\App\Models\Articles::all() as $article)

            <x-shop.article
                id="{{$article->id}}"
                titre="{{$article->titre}}"
                prix="{{$article->prix}}"
                img="{{$article->img}}"
                nb="{{$article->nb}}"
                discount="{{$article->discount}}"
                tags="{{$article->tags}}"
                description="{{$article->description}}"
            />
    @endforeach

</div>

<x-footer/>

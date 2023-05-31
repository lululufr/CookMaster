<x-header/>

<h2 class="text-2xl font-bold py-2 text-center">La COOK Boutique</h2>

    @foreach(\App\Models\Articles::all() as $article)

            <x-shop.article
                titre="{{$article->titre}}"
                prix="{{$article->prix}}"
                img="{{$article->img}}"
                nb="{{$article->nb}}"
                discount="{{$article->discount}}"
                tags="{{$article->tags}}"
                description="{{$article->description}}"
            />
    @endforeach

<x-footer/>

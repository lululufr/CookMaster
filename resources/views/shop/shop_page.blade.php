<x-header/>

<h2 class="text-2xl font-bold py-2 text-center">La COOK Boutique</h2>

<div class="grid grid-cols-4 gap-4">



{{$articles->links()}}

                @foreach($articles as $article)

                    <div class="card">
                        <x-shop.article
                            id="{{$article->id}}"
                            titre="{{$article->titre}}"
                            prix="{{$article->prix}}"
                            img="{{asset("storage/".$article->img)}}"
                            nb="{{$article->nb}}"
                            discount="{{$article->discount}}"
                            tags="{{$article->tags}}"
                            description="{{$article->description}}"
                        />
                    </div>
                @endforeach


            </div>


<x-footer/>

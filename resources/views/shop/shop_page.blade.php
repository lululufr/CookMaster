<x-header/>

<h2 class="text-2xl font-bold py-2 text-center">La COOK Boutique</h2>

<div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">



{{$articles->links()}}

                @foreach($articles as $article)
                    <div class="card card-side bg-base-100 shadow-xl">
                        <figure><img class="img-fluid w-32" src="{{asset("storage/".$article->img)}}" alt="Movie"/></figure>
                        <div class="card-body">
                            <h2 class="card-title">{{$article->titre}}</h2>
                            <p>{{$article->description}}</p>
                            <p>{{$article->tags}}</p>
                            <b>{{$article->prix}} €</b>
                            <p class="text-lg my-4">
                                <i class="fa-solid fa-location-dot"></i> {{$article->nb}} articles restants
                            </p>
                            <div class="card-actions justify-end">
                                @if($article->nb == 0)
                                    <a class="btn btn-primary" href="/shop/cart/add/{{$article->id}}" disabled>Ajouter au panier</a>
                                    @else
                                    <a class="btn btn-primary" href="/shop/cart/add/{{$article->id}}">Ajouter au panier</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>


<x-footer/>

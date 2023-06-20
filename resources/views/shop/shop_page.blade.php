<x-header/>

<h2 class="text-2xl font-bold py-2 text-center">La COOK Boutique</h2>

<div class="grid grid-cols-4 gap-4">




                @foreach(\App\Models\Articles::all() as $article)
                <div class="">
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

                </div>
                @endforeach



                @foreach(\App\Models\Classes::all() as $article)

                            <div class="">

                    <x-shop.article
                        id="{{$article->id}}"
                        titre="{{$article->title}}"
                        prix="{{$article->price}}"
                        img="{{$article->img}}"
                        nb=""
                        discount=""
                        tags=""
                        description="{{$article->description}}"
                    />
                            </div>
                @endforeach



            </div>


<x-footer/>

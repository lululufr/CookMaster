<x-header/>

<h2 class="text-2xl font-bold py-2 text-center">La COOK Boutique</h2>

<div class="grid grid-cols-4 gap-4">



{{$articles->links()}}

                @foreach($articles as $article)
                    <div>

                        <div class="mx-4">
                            <div class="p-10">
                                <div class="flex flex-col items-center justify-center text-center">
                                    <img class="w-48 mr-6 mb-6" src="{{asset("storage/".$article->img)}}"/>

                                    <h3 class="text-2xl mb-2">

                                    </h3>
                                    <div class="text-xl font-bold mb-4">{{$article->tags}}</div>

                                    <div>
                                        {{$article->prix}}

                                        discount : {{$article->discount}}
                                    </div>

                                    <div>
                                        <a href="/shop/cart/add/{{$article->id}}">ACHETER</a>
                                    </div>

                                    <div class="text-lg my-4">
                                        <i class="fa-solid fa-location-dot"></i> {{$article->nb}} articles restants
                                    </div>
                                    <div class="border border-gray-200 w-full mb-6"></div>
                                    <div>
                                        <h3 class="text-3xl font-bold mb-4">{{$article->titre}}</h3>
                                        <div class="text-lg space-y-6">
                                            {{$article->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>


<x-footer/>

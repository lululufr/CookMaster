<x-header/>
@php(\App\Http\Controllers\AdsController::ads())


<div class="grid flex flex-content">
    @foreach($posts as $post)
        <div>
            <div class="mx-4">
                <div class="p-10">
                    <div class="flex flex-col items-center justify-center text-center">
                        <article class="flex flex-col shadow my-4">
                            <!-- Article Image -->
                            <a href="#" class="hover:opacity-75">
                                @if($post->image)
                                    <figure><img src="{{asset("storage/".$post->image)}}" /></figure>
                                @else
                                    <figure><img src="https://picsum.photos/200/300" /></figure>
                                @endif
                            </a>
                            <div class="bg-white flex flex-col justify-start p-6">
                                <p class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->tags}}</p>
                                <p class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->titre}}</p>
                                <br>
                                <br>
                                <p class="pb-6">{{$post->content}}</p>

                                <p class="text-sm pb-3">
                                    Published {{$post->time}}
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

@php(\App\Http\Controllers\AdsController::ads())

<x-footer/>

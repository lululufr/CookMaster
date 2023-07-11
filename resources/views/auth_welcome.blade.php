<x-header/>
@php(\App\Http\Controllers\AdsController::ads())

{{$posts->links()}}
<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 mx-4 place-content-center place-items-center">

    @foreach($posts as $post)

        <div class="card w-96 bg-base-100 shadow-xl">
            <figure><img src="{{asset("storage/".$post->image)}}" alt="Shoes" /></figure>
            <div class="card-body">
                <h2 class="card-title">
                    {{$post->titre}}

                </h2>
                <p>{{$post->content}}</p>
                <div class="card-actions justify-end">

                    <a class="badge badge-primary" href="/recipe/{{$post->id}}">Commenter</a>

                    <div class="badge badge-outline">Published {{$post->created_at}}</div>

                </div>
            </div>
        </div>


    @endforeach





</div>

@php(\App\Http\Controllers\AdsController::ads())

<x-footer/>

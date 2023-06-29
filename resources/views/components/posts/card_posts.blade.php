
<!--
<div class="card w-96 bg-base-100 shadow-xl">
    @if($img)
    <figure><img src="{{$img}}" alt="Shoes" /></figure>
    @endif
    <div class="card-body">
        <h2 class="card-title">
            @if($tags)
                <div class="badge badge-secondary">{{$tags}}</div>
            @endif
        </h2>
        <p>{{$content}}</p>
        <div class="card-actions justify-end">
            <div class="badge badge-outline"></div>
            <div class="badge badge-outline">{{$time}}</div>
        </div>
    </div>
</div>
-->
<div>
    <div class="mx-4">
        <div class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <article class="flex flex-col shadow my-4">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        @if($img)
                            <figure><img src="{{asset("storage/".$img)}}" /></figure>
                        @endif
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <p class="text-blue-700 text-sm font-bold uppercase pb-4">{{$tags}}</p>
                        <p class="text-3xl font-bold hover:text-gray-700 pb-4">{{$titre}}</p>
                        <br>
                        <br>
                        <p class="pb-6">{{$content}}</p>

                        <p class="text-sm pb-3">
                            Published {{$time}}
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>


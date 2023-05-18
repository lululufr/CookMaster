

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
            <!--<div class="badge badge-outline"></div>-->
            <div class="badge badge-outline">{{$time}}</div>
        </div>
    </div>
</div>


<x-header/>

<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">

@foreach($lives as $live)

    <div class="card w-96 bg-base-100 shadow-xl m-3">

        <div class="card-body items-center text-center">
            <h2 class="card-title">{{$live->title}}</h2>
            <div class="card-actions">
                <a href="/live/list/{{$live->id}}" class="btn btn-primary">Voir</a>
            </div>
        </div>
    </div>

@endforeach
</div>
<x-footer/>

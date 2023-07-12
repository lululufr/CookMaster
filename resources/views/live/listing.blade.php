<x-header/>



@foreach($lives as $live)

    <div class="card w-96 bg-base-100 shadow-xl">
        <figure class="px-10 pt-10">
            <img src="g" alt="Shoes" class="rounded-xl" />
        </figure>

        <div class="card-body items-center text-center">
            <h2 class="card-title">{{$live->title}}</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions">
                <a href="/live/list/{{$live->id}}" class="btn btn-primary">Voir</a>
            </div>
        </div>
    </div>

@endforeach

<x-footer/>

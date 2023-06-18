
<div class="card h-63 w-96">
    <div class="card-body items-center text-center">
        <h2 class="card-title">{{$title}}</h2>
        <p>{{$content}}</p>
        <div class="card-actions justify-end">



        <form action="/admin/modify/apply/{{$id}}" method="POST">
                @csrf

            <div class="collapse">

                <p>Nouveau {{$table}} : </p>
                    <input name="new_content" type="text" class="input input-bordered input-primary w-full max-w-xs"/>

                    <button type="submit" class="btn">Modifier</button>
                </div>
        </form>







        </div>
    </div>
</div>

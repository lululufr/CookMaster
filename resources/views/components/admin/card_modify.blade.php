
<div class="card w-96 bg-neutral text-neutral-content">
    <div class="card-body items-center text-center">
        <h2 class="card-title">{{$title}}</h2>
        <p>{{$content}}</p>
        <div class="card-actions justify-end">



        <form action="/admin/modify/apply/{{$id}}" method="POST">
                @csrf

            <div class="collapse">
                <input type="checkbox"/>
                <div class="collapse-title text-xl font-medium">
                    Modifier
                </div>
                <div class="collapse-content">
                    <input type="hidden" name="table" value="{{$table}}"></input>
                    <input class="input" name="new_content"></input>

                    <button type="submit" class="btn btn-ghost">Valider</button>
                </div>
            </div>

        </form>







        </div>
    </div>
</div>

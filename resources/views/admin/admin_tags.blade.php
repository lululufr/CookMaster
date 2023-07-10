<x-header/>




<div class="overflow-x-auto w-full">

    <form action="/admin/create/tags" method="post">
        @csrf
        <input type="text" name="name" placeholder="tag">
        <button type="submit" class="btn btn-accent">Ajouter un tag</button>
    </form>


    <table class="table w-full">
        <!-- head -->
        <thead>
        <tr>
            <th>tag</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{$tag->name}}</td>
                <td>
                    <form action="/admin/delete/tags/{{$tag->name}}" method="post">
                        @csrf
                        <button class="btn btn-error">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>








<x_footer/>

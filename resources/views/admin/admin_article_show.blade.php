<x-header/>

<div class="overflow-x-auto w-full">

    <a href="/admin/article/create" class="btn btn-primary">Créer un article</a>

    <table class="table w-full">
        <!-- head -->
        <thead>
        <tr>
            <th>Article</th>
            <th>prix</th>
            <th>stock</th>
            <th>description</th>
        </tr>
        </thead>
        <tbody>

        @foreach($articles as $article)
            <tr>
                <td>{{$article->titre}}</td>
                <td>
                    <div class="grid grid-cols-3">
                        <form action="/admin/article/modify/{{$article->id}}" method="post" class="grid">
                        @csrf
                        <input type="hidden" value="price" name="change">
                            <input  type="number" name="value" value="{{$article->prix}}">
{{--                            <button class="btn btn-accent ">Modifier</button>--}}
                        </form>
                    </div>
                </td>
                <td>
                    <div class="grid grid-cols-3">
                        <form action="/admin/article/modify/{{$article->id}}" method="post" class="grid">
                            @csrf
                            <input type="hidden" value="stock" name="change">
                            <input  type="number" name="value" value="{{$article->nb}}">
{{--                            <button class="btn btn-accent ">Modifier</button>--}}
                        </form>
                    </div>
                </td>
                <td>{{$article->description}}</td>
                <td>
                    <form action="/admin/article/delete/{{$article->id}}" method="post">
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

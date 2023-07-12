<x-header/>




<div class="overflow-x-auto w-full">

    <form action="/admin/create/ingredients" method="post">
        @csrf
        <input type="text" name="name" placeholder="ingrédient">
        <button type="submit" class="btn btn-accent">Ajouter un ingrédient</button>
    </form>


    <table class="table w-full">
        <!-- head -->
        <thead>
        <tr>
            <th>Ingrédient</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>



        @foreach($ingredients as $ingredient)
            <tr>
                <td>{{$ingredient->name}}</td>
                <td>
                    <form action="/admin/delete/ingredients/{{$ingredient->name}}" method="post">
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

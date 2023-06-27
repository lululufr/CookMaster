<x-header/>




<div class="overflow-x-auto w-full">

    <form action="/admin/create/utensil_type" method="post">
        @csrf
        <input type="text" name="type" placeholder="type d'ustensile">
        <button type="submit" class="btn btn-accent">Ajouter un type d'ustensile</button>
    </form>
    <form action="/admin/create/utensil" method="post">
        @csrf
        <select name="type" class="col-span-5 w-full">
            @foreach(\App\Models\UtensilTypes::all() as $utensil)
                <option value="{{$utensil->type}}">{{$utensil->type}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-accent">Ajouter un ustensile</button>
    </form>

    <table class="table w-full">
        <!-- head -->
        <thead>
        <tr>
            <th>id</th>
            <th>ustensile</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>



        @foreach($utensils as $utensil)
            <tr>
                <td>{{$utensil->id}}</td>
                <td>{{$utensil->type}}</td>
                <td>
                    <form action="/admin/delete/utensil/{{$utensil->id}}" method="post">
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

<tr>
    <th>
        <label>
            <div class="flex items-center space-x-3">
                <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                        <img src="{{$pp}}" alt="Avatar Tailwind CSS Component" />
                    </div>
                </div>
        </label>
    </th>

    <td>
            <div>
                <div class="font-bold">{{$id}}</div>
            </div>
        </div>
    </td>

        <td>{{$pseudo}}</td>

    @if($prenom)
        <td>{{$prenom}}</td>
    @else
        <td>Non renseigné</td>
    @endif



    <td>{{$email}}</td>
    <th>
        <form action="/admin/modify/{{$id}}" method="POST">
            @csrf
            <button class="btn btn-accent p-1">Modifier</button>
        </form>

        <form action="/admin/delete/{{$id}}" method="POST">
            @csrf
            <button class="btn btn-error p-1">Supprimer</button>
        </form>
    </th>
</tr>




<tr>
    <th>
        <label>
            <div class="flex items-center space-x-3">
                <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                        <p> {{$city}}<p/>
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

    <td>{{$street}}</td>


    <td>{{$postalcode}}</td>

    <td>{{$description}}</td>

    <th>
        <form action="/admin/room/modify/{{$id}}" method="POST">
            @csrf
            <button class="btn btn-accent">Modifier</button>
        </form>

        <form action="/admin/room/delete/{{$id}}" method="POST">
            @csrf
            <button class="btn btn-error">Supprimer</button>
        </form>

    </th>
</tr>

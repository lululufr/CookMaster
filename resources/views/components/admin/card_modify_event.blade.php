<tr>
    <th>
        {{$title}}
    </th>

    <td>
        <div>
            <div class="font-bold">{{$id}}</div>
        </div>
    </td>

    <td>{{$description}}</td>
    <td>{{$room_id}}</td>
    <td>{{$tags}}</td>
    <td>{{$start}}</td>
    <td>{{$duration}}</td>

    <th>
        <form action="/admin/modify/event/{{$id}}" method="POST">
            @csrf
            <button class="btn btn-accent">Modifier</button>
        </form>

        <form action="/admin/delete/{{$id}}" method="POST">
            @csrf
            <button class="btn btn-error">Supprimer</button>
        </form>
    </th>
</tr>

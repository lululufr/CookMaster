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
        <label for="modal{{$id}}{{$pseudo}}" class="btn">open modal</label>
    </th>
</tr>


<!-- Modal -->
    <input type="checkbox" id="modal{{$id}}{{$pseudo}}" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box p-3">
            <h3 class="font-bold text-lg">Id : {{$id}} Pseudo : {{$pseudo}}</h3>
            <p class="py-4">Veuillez choisir l'action :</p>


            <form action="/admin/modify/{{$id}}" method="POST">
                @csrf
                <button class="btn btn-accent">Modifier</button>
            </form>

            <form action="/admin/delete/{{$id}}" method="POST">
                @csrf
                <button class="btn btn-error">Supprimer</button>
            </form>

        </div>
    </div>
<!-- Modal -->

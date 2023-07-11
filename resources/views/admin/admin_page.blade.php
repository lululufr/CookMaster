<x-header/>




{{$users->links()}}
<div class="overflow-x-auto w-full">
    <table class="table w-full">
        <!-- head -->
        <thead>
        <tr>
            <th>
                <label>
                    PP
                </label>
            </th>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>



        @foreach($users as $user)
            <tr>
                <th>
                    <label>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img src="{{asset("storage/".$user->profil_picture)}}" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                    </label>
                </th>
                <td>
                    <div>
                        <div class="font-bold">{{$user->id}}</div>
                    </div>
                </td>

                <td>{{$user->username}}</td>

                @if($user->firstname)
                    <td>{{$user->firstname}}</td>
                @else
                    <td>Non renseigné</td>
                @endif


                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <th>
                    <form action="/admin/modify/{{$user->id}}" method="POST">
                        @csrf
                        <button class="btn btn-accent p-1">Modifier</button>
                    </form>
                </th>
                <th>
                    <form action="/admin/delete/{{$user->id}}" method="POST">
                        @csrf
                        <button class="btn btn-error p-1">Supprimer</button>
                    </form>
                </th>
                </tr>


            @endforeach
        </tbody>
    </table>
</div>








<x_footer/>

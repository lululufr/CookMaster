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
                <x-admin.user_admin

                    id="{{$user->id}}"
                    pseudo="{{$user->username}}"
                    prenom="{{$user->firstname}}"
                    email="{{$user->email}}"
                    status="{{$user->status}}"

                    pp="{{$user->profil_picture}}"

                />
            </tr>
            @endforeach
        </tbody>
    </table>
</div>








<x_footer/>

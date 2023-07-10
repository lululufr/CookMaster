<x-header/>
<div class="grid grid-cols-1 align-items-center flex-wrap m-4">
    <!-- Elem doit etre le nom de la table a modifier-->


    <form action="/admin/modify/apply/{{$user->id}}" method="POST">
        @csrf
    <div class="m-2">
        <x-admin.card_modify
            title="Identifiant"
            content="{{$user->username}}"
            table="username"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify
            title="Prenom"
            content="{{$user->firstname}}"
            table="firstname"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify
            title="Nom de famille"
            content="{{$user->lastname}}"
            table="lastname"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify
            title="Email"
            content="{{$user->email}}"
            table="email"/>
    </div>

    <div class="card h-63 w-96">
        <div class="card-body items-center text-center">
            <h2 class="card-title">Role :</h2>
            <p>Modifier le rôle :</p>
            <div class="card-actions justify-end">

                    <div class="collapse">
                        <p>Cet utilisateur est {{$user->role}}:</p>
                        <select name="role" class="input input-bordered input-primary w-full max-w-xs">
                            <option value="admin">Admin</option>
                            <option value="chef">Chef</option>
                            <option value="user">User</option>
                        </select>

                        <button type="submit" class="btn">Modifier</button>
                    </div>
            </div>
        </div>
    </div>


    <div class="card h-63 w-96">
        <div class="card-body items-center text-center">
            <h2 class="card-title">Role :</h2>
            <p>Modifier le buying plan :</p>
            <div class="card-actions justify-end">

                    <div class="collapse">
                        <p>Cet utilisateur est {{$user->buying_plan}}:</p>
                        <select name="buying_plan" class="input input-bordered input-primary w-full max-w-xs">
                            <option value="free">Free</option>
                            <option value="starter">Starter</option>
                            <option value="master">Master</option>
                        </select>

                    </div>
            </div>
        </div>
    </div>
        <button type="submit" class="btn">Modifier</button>
    </form>

</div>
<x-footer/>

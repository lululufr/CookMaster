<x-header/>
<div class="flex flex-wrap m-4">
    <!-- Elem doit etre le nom de la table a modifier-->
    <div class="m-2">
        <x-admin.card_modify
            title="Identifiant"
            content="L'identifiant de l'utilisateur est : {{$user->username}}."
            table="username"
            id="{{$user->id}}"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify
            title="Prenom"
            content="Le prenom de l'utilisateur est : {{$user->firstname}}."
            table="firstname"
            id="{{$user->id}}"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify
            title="Nom de famille"
            content="Le nom de famille de l'utilisateur est : {{$user->lastname}}."
            table="lastname"
            id="{{$user->id}}"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify
            title="Email"
            content="L'Email de l'utilisateur est : {{$user->email}}."
            table="email"
            id="{{$user->id}}"/>
    </div>

    <div class="card h-63 w-96">
        <div class="card-body items-center text-center">
            <h2 class="card-title">Role :</h2>
            <p>Modifier le rôle :</p>
            <div class="card-actions justify-end">
                <form action="/admin/modify/apply/{{$user->id}}" method="POST">
                    @csrf

                    <input type="hidden" name="table" value="role">

                    <div class="collapse">
                        <p>Cet utilisateur est {{$user->role}}:</p>
                        <select name="new_content" class="input input-bordered input-primary w-full max-w-xs">
                            <option value="admin">Admin</option>
                            <option value="chef">Chef</option>
                            <option value="user">User</option>
                        </select>

                        <button type="submit" class="btn">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card h-63 w-96">
        <div class="card-body items-center text-center">
            <h2 class="card-title">Role :</h2>
            <p>Modifier le buying plan :</p>
            <div class="card-actions justify-end">
                <form action="/admin/modify/apply/{{$user->id}}" method="POST">
                    @csrf

                    <input type="hidden" name="table" value="buying_plan">

                    <div class="collapse">
                        <p>Cet utilisateur est {{$user->buying_plan}}:</p>
                        <select name="new_content" class="input input-bordered input-primary w-full max-w-xs">
                            <option value="free">Free</option>
                            <option value="starter">Starter</option>
                            <option value="master">Master</option>
                        </select>

                        <button type="submit" class="btn">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<x-footer/>

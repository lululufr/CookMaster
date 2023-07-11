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

    <div class="m-2">
        <x-admin.card_modify
            title="Role"
            content="L'utilisateur est : {{$user->role}}."
            table="role"
            id="{{$user->id}}"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify
            title="Buying Plan"
            content="L'utilisateur est : {{$user->buying_plan}}."
            table="buying_plan"
            id="{{$user->id}}"/>
    </div>

</div>
<x-footer/>

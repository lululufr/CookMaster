<x-header/>
<div class="flex flex-wrap m-4">
    <!-- Elem doit etre le nom de la table a modifier-->
    <div class="m-2">
        <x-admin.card_modify_room
            title="Ville"
            content="La ville de la salle est : {{$rooms->city}}."
            table="city"
            id="{{$rooms->id}}"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify_room
            title="Rue"
            content="La rue de la salle est : {{$rooms->street}}."
            table="street"
            id="{{$rooms->id}}"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify_room
            title="Code Postal"
            content="Le code postal est : {{$rooms->postal_code}}."
            table="postal_code"
            id="{{$rooms->id}}"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify_room
            title="N de salle"
            content="Le numero de la salle est : {{$rooms->salle_number}}."
            table="salle_number"
            id="{{$rooms->id}}"/>
    </div>

    <div class="m-2">
        <x-admin.card_modify_room
            title="Description"
            content="La description est : {{$rooms->description}}."
            table="description"
            id="{{$rooms->id}}"/>
    </div>

</div>
<x-footer/>

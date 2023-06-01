<x-header/>

<form method="POST" action="/admin/room/create/apply">
    @csrf
    <input name="city" class="input" placeholder="La ville"/>
    <input name="street" class="input" placeholder="La Rue"/>
    <input name="postal_code" class="input" placeholder="Le code postal"/>
    <input name="salle_number" class="input" placeholder="Le numero de salle"/>
    <input name="description" class="input" placeholder="La description"/>
    <input name="tags" class="input" placeholder="#bestlife"/>

    <button class="btn btn-secondary" type="submit">Créer</button>
</form>


<x-footer/>

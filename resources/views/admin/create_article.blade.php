<x-header/>


<form method="POST" action="/admin/article/create/apply">
    @csrf
    <input name="titre" class="input" placeholder="Nom de l'article"/>
    <input name="img" class="input" type="image" placeholder="image">
    <input name="prix" class="input" type="number" placeholder="prix"/>
    <input name="discount" class="input" type="number" placeholder="réduction"/>
    <input name="tags" class="input" placeholder="tags"/>
    <input name="description" class="input" placeholder="La description"/>
    <input name="lesson" class="input" placeholder="lesson"/>

    <button class="btn btn-secondary" type="submit">Créer</button>
</form>


<x-footer/>

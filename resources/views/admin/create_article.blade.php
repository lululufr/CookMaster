<x-header/>


<form method="POST" action="/admin/article/create/apply" enctype="multipart/form-data">
    @csrf
    <input name="titre" class="input" placeholder="Nom de l'article"/>
    <label for="media">Image de couverture :</label>
    <input type="file" name="media"><br>
    <input name="prix" class="input" type="number" placeholder="prix"/>
    <input name="discount" class="input" type="number" placeholder="réduction"/>
    <input name="nb" class="input" type="number" placeholder="Nombre d'article"/>
    <input name="tags" class="input" placeholder="tags"/>
    <input name="description" class="input" placeholder="La description"/>

    <button class="btn btn-secondary" type="submit">Créer</button>
</form>


<x-footer/>

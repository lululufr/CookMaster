<x-header/>


<form method="POST" action="/event/create">
    @csrf
    <input name="title" class="input" placeholder="titre de l'article"/>
    <input name="room" class="input" type="number" placeholder="ID de la salle">
    <input name="tags" class="input" placeholder="tags"/>
    <input name="description" class="input" placeholder="La description"/>
    <input name="lesson" class="input" placeholder="Leçon"/>
    <input name="start" class="input" type="date" placeholder="Début de l'évènement"/>
    <input name="duree" class="input" type="number" placeholder="Durée de l'évènement"/>

    <button class="btn btn-secondary" type="submit">Créer</button>
</form>


<x-footer/>

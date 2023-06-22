<x-header/>


<form method="POST" action="/event/create"  class="grid justify-items-center m-4">
    @csrf
    <div class="form-control w-full max-w-xs m-5">
        <input name="title" class="input" placeholder="titre de l'event"/>
    </div>

    <div class="form-control w-full max-w-xs m-5">
        <label for="rooms">Choisir une salle:</label>
        <select name="room" id="room">

            @foreach(\App\Models\Rooms::all() as $room)
                <option value="{{$room->id}}">{{$room->street}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control w-full max-w-xs m-5">
        <input name="tags" class="input" placeholder="tags"/>
    </div>
    <div class="form-control w-full max-w-xs m-5">
        <input name="description" class="input" placeholder="La description"/>
    </div>
    <div class="form-control w-full max-w-xs m-5">
        <input name="max_participants" class="int" min="1" placeholder="Nombre maximum de participants"/>
    </div>
    <div class="form-control w-full max-w-xs m-5">
        <input name="lesson" class="input" placeholder="Leçon qui sera enseignée"/>
    </div>
    <div class="form-control w-full max-w-xs m-5">
        <input name="start" class="input" type="datetime-local" placeholder="Début de l'évènement"/>
    </div>
    <div class="form-control w-full max-w-xs m-5">
        <input name="duration" class="input" type="number" min="1" max="2" placeholder="Durée de l'évènement"/>
    </div>

    <button class="btn btn-secondary" type="submit">Créer</button>
</form>


<x-footer/>

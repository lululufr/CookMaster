<x-header/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var state = 1;
        var chef= `
        <label for="chef_username">Choisir un chef:</label>
        <select name="chef_username" id="chef_username">
            @foreach(\App\Models\User::where('role','chef')->get() as $chef)
            <option value="{{$chef->username}}">{{$chef->username}}</option>
                @endforeach
        </select>`;
        var room = `
        <label for="rooms">Choisir une salle:</label>
        <select name="room" id="room">

            @foreach(\App\Models\Rooms::all() as $room)
        <option value="{{$room->id}}">{{$room->street}}</option>
            @endforeach
        </select>`;
        $('#toggleButton').click(function() {
            if (state === 1) {
                $('#myDiv').empty().append(room);
                $('#toggleButton').text('Faire une leçon privée');
                state = 2;
            } else {
                $('#myDiv').empty().append(chef);
                $('#toggleButton').text('Faire une réservation de salle');
                state = 1;
            }
        });
    });
</script>


<form method="POST" action="/event/create"  class="grid justify-items-center m-4">
    @csrf
    <?php
    if(auth()->user()->buying_plan === 'master'){
        echo '<button id="toggleButton">Faire une leçon privée</button>';
    }?>
    <div id="myDiv" class="form-control w-full max-w-xs m-5">
        <label for="chef_username">Choisir un chef:</label>
        <select name="chef_username" id="chef_username">
            @foreach(\App\Models\User::where('role','chef')->get() as $chef)
                <option value="{{$chef->username}}">{{$chef->username}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control w-full max-w-xs m-5">
        <label for="lesson">Choisir une leçon:</label>
        <select name="lesson" id="chef_username">
            @foreach(\App\Models\Recipes::all() as $recipe)
                <option value="{{$recipe->id}}">{{$recipe->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control w-full max-w-xs m-5">
        <input name="start" class="input" type="datetime-local" placeholder="Date et heure de la leçon" required/>
    </div>
    <input type="hidden" name="tags" value="private">
    <input type="hidden" name="max_participants" value="1">
    <input type="hidden" name="userid" value="{{auth()->id()}}">
    <button class="btn btn-secondary" type="submit">Créer</button>
</form>


<x-footer/>

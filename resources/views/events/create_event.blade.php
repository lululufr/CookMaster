<x-header/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#addTag').click(function() {
                var formulairetag = `
            <div class="card bg-base-300 class="grid grid-col-7">
                <div class="elementFormulaire">
                    <div class="col-span-1"></div>
                    <label for="tags" >tag :</label>
                    <select name="tags[]" class="col-span-5 w-full">
                    @foreach(\App\Models\Tags::all() as $tag)
                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                <div class="col-span-1"></div>

                <button class="supprimerFormulaire" type="button">X</button>
                </div>
            </div>
`;
                $('#tagAdd').append(formulairetag);
            });
        });
        $(document).ready(function() {
            $('#addUtensil').click(function() {
                var formulairetag = `
            <div class="card bg-base-300 class="grid grid-col-7">
                <div class="elementFormulaire">
                    <div class="col-span-1"></div>
                    <label for="utensils" >Ustensiles :</label>
                    <select name="utensils[]" class="col-span-5 w-full">
                    @foreach(\App\Models\UtensilTypes::all() as $utensil)
                <option value="{{$utensil->type}}">{{$utensil->type}}</option>
                    @endforeach
                </select>
                <div class="col-span-1"></div>

                <button class="supprimerFormulaire" type="button">X</button>
                </div>
            </div>
`;
                $('#utensilAdd').append(formulairetag);
            });
        });
        $(document).on('click', '.supprimerFormulaire', function() {
            $(this).parent('.elementFormulaire').remove();
        });
    });
</script>
<form method="POST" action="/event/create"  class="grid justify-items-center m-4">
    @csrf
    <div class="form-control w-full max-w-xs m-5">
        <input name="title" type="text" placeholder="titre de l'event"/>
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
        <label for="rooms">Choisir un chef:</label>
        <select name="chef_username" id="chef_username">

            @foreach(\App\Models\User::where('role','chef')->get() as $chef)
                <option value="{{$chef->username}}">{{$chef->username}}</option>
            @endforeach
        </select>
    </div>

    <div id="tagAdd" class="form-control w-full max-w-xs m-5"></div>
    <button class="btn" type="button" id="addTag">Ajouter un tag</button>

    <div id="utensilAdd" class="form-control w-full max-w-xs m-5"></div>
    <button class="btn" type="button" id="addUtensil">Ajouter un ustensile</button>


    <div class="form-control w-full max-w-xs m-5">
        <input name="description" type="text" placeholder="La description"/>
    </div>

    <div class="form-control w-full max-w-xs m-5">
        <input name="max_participants" type="number" min="1" placeholder="Nombre maximum de participants"/>
    </div>

    <div class="form-control w-full max-w-xs m-5">
        <label name="lesson">Choisir une leçon:</label>
        <select name="lesson" id="chef_username">

            @foreach(\App\Models\Recipes::all() as $recipe)
                <option value="{{$recipe->id}}">{{$recipe->title}}</option>
            @endforeach
        </select>
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

<x-header/>

<form method="POST" action="/event/create"  class="grid justify-items-center m-4">
    @csrf
    <div class="form-control w-full max-w-xs m-5">
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

@if(session('message'))
    <div class="alert alert-success">
        Préférences modifiés avec succes
    </div>
@endif
<x-header/>

<form action="/users/preferences/change" method="POST">
    @csrf

    <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text">Choisissez votre theme</span>
        </label>
        <select class="select select-bordered" name="theme">
            <option disabled selected>{{auth()->user()->theme}}</option>
            <option>cyberpunk</option>
            <option>bumblebee</option>
            <option>coffee</option>
            <option>night</option>
            <option>acid</option>
            <option>dracula</option>
        </select>
    </div>

    <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text">Choisissez votre Langue</span>
        </label>
        <select class="select select-bordered" name="theme">
            <option disabled selected>{{auth()->user()->langue}}</option>
            <option>Francais</option>
            <option>Anglais</option>
            <option>Zoulou</option>

        </select>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>

</form>






</form>





<x-footer/>

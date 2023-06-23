@if(session('message'))
    <div class="alert alert-success">
        Profil modifiés avec succes
    </div>
@endif
<x-header/>
<div class="form-control grid justify-items-center m-4 w-full max-w-xs">


    <a href="/user/pref" class="btn">MES ELEMENTS</a>


    <h2>PLAN actuelle : {{auth()->user()->buying_plan}}</h2>


    <form method="get">
        @csrf
        <div class="form-control w-full max-w-xs m-5">
            <img src="{{$infos['profil_picture']}}" alt="error" style="max-width: 40%;"/>
            <input type="image" name="img" id="profil_picture" >
            @error('pseudonyme')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-control w-full max-w-xs m-5">
            <label>Pseudonyme</label>
            <input type="text" name="username" placeholder="{{$infos['username']}}"
                   class="input w-full max-w-xs
                          @error('pseudonyme') is-invalide @enderror"/>

            @error('pseudonyme')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control w-full max-w-xs m-5">
        <label>Prénom</label>
            <input type="text" name="firstname" placeholder="{{$infos['firstname']}}"
                   class="input w-full max-w-xs
                         @error('firstname') is-invalide @enderror"/>

            @error('firstname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full max-w-xs m-5">
        <label >Nom</label>
            <input type="text" name="lastname" placeholder="{{$infos['lastname']}}"
                   class="input w-full max-w-xs
                         @error('lastname') is-invalide @enderror"/>

            @error('lastname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full max-w-xs m-5">
        <label >E-mail</label>
        <input type="text" name="email" placeholder="{{$infos['email']}}"
               class="input w-full max-w-xs
                     @error('email') is-invalide @enderror"/>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-control w-full max-w-xs m-5">
            <label >Mot de passe</label>
            <input type="password" name="email" placeholder="XXXX"
                   class="input w-full max-w-xs
                         @error('password') is-invalide @enderror"/>

            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit">
    </form>

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
            <select class="select select-bordered" name="langue">
                <option disabled selected>{{auth()->user()->langue}}</option>
                <option>Francais</option>
                <option>Anglais</option>
                <option>Zoulou</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>
</div>
<div></div>
dernière modification{{$infos['updated_at']}}
compte créé le : {{$infos['created_at']}}
<x-footer/>

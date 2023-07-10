@if(session('message'))
    <div class="alert alert-success">
        Profil modifiés avec succes
    </div>
@endif
<x-header/>
<div class="form-control grid justify-items-center m-4 w-full max-w-xs">


    <a href="/user/pref" class="btn">MES ELEMENTS</a>


    <h2>PLAN actuelle : {{auth()->user()->buying_plan}}</h2>
    <h2>Vous avez regardez {{auth()->user()->nb_classes}} chapitre de formation</h2>


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

<div>
    <p>Language</p>

    <a class="btn" href="/locale/en">English</a>
    <a class="btn" href="/locale/fr">Francais</a>
    <a class="btn" href="/locale/de">Allemand</a>
    <a class="btn" href="/locale/ch">中国人</a>

</div>


</div>
<div></div>
dernière modification{{$infos['updated_at']}}
compte créé le : {{$infos['created_at']}}
<x-footer/>

<p>{{ __("Accueil") }}</p>

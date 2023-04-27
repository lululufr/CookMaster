<!DOCTYPE html>
<html lang="fr" data-theme=
@auth
    {{auth()->user()->theme}}
@else
    "dracula"
@endauth
>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--daisy UI-->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.5/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Cook Master</title>
</head>
<body>

    <div class="navbar bg-secondary">
        <div class="navbar-start">
            @auth
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="/profil/{{auth()->user()->username}}"> Votre profil</a></li>
                    <li><a>Portfolio</a></li>
                    <li><a>About</a></li>
                </ul>
            </div>
                <div class="avatar">
                    <div class="w-9 rounded-full">
                        <img src="{{auth()->user()->profil_picture}}" class="w-1/12"/>
                    </div>
                </div>
        </div>
        @else
            </div>

        @endauth


        <div class="navbar-center">
            <a href="/" class="btn btn-ghost normal-case text-xl">COOK with ME</a>
        </div>






        <div class="navbar-end">

                <div class="indicator">
                    @auth
                        <form class="" method="POST" action="/logout">
                            @csrf <!-- {{ csrf_field() }} -->
                            Bonjour {{auth()->user()->username}}
                            <button type="submit" class="btn btn-accent">Deconnexion</button>
                        </form>
                    @else
                        <div>
                            <a href="/register" class="btn btn-primary">register</a>
                            <label for="login_modal" class="btn btn-secondary">Se connecter</label>
                        </div>
                    @endauth
                </div>

        </div>
    </div>

    </div>
</div>






@yield('content')


<input type="checkbox" id="login_modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
  <div class="modal-box">

    <h3 class="font-bold text-lg">Veuillez saisir vos identifiants</h3>
        <form method="POST" action="/login">
        @csrf
            <input name="username" type="text" placeholder="Identifiant" class="input input-bordered w-full max-w-xs">
            <input name="password" type="password" placeholder="Mot de passe" class="input input-bordered w-full max-w-xs">

            <button type="submit" class="btn btn-ghost">Se connecter</button>
        </form>
    <div class="modal-action">
      <label for="login_modal" class="btn">Annuler</label>
    </div>
  </div>
</div>


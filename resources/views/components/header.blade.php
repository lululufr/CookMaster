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


<div></div>

<div class="justify-items-center grid grid-cols-3 m-5">

@auth

<form class="" method="POST" action="/logout">
@csrf <!-- {{ csrf_field() }} -->


Welcome {{auth()->user()->username}}
<button type="submit" class="btn">Deconnexion</button>
</form>

@else
<div>
    <a href="/register" class="btn btn-ghost">register</a>

    <label for="login_modal" class="btn">Se connecter</label>
</div>

@endauth


    <div>
        <ul class="menu menu-horizontal bg-primary text-secondary-content rounded-box p-2">
        <li tabindex="0">
            <span>PROFIL</span>
            <ul class="rounded-box bg-primary p-2">
            <li><a>Mon profile</a></li>
            <li><a>Mes contacts</a></li>
            </ul>
        </li>
        <li tabindex="0">
            <span>COOK</span>
            <ul class="rounded-box bg-primary p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
            <li><a>Submenu 3</a></li>
            </ul>
        </li>

        <li tabindex="0">
            <span>PARAMETER</span>
            <ul class="rounded-box bg-primary p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
            <li><a>Submenu 3</a></li>
            </ul>
        </li>
        </ul>
        </div>
    <div>
        @auth
            <a href="/profil/{{auth()->user()->username}}" class="btn btn-primary"> Votre profil</a>
        @endauth
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


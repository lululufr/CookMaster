<!DOCTYPE html>
<html lang="fr" data-theme="dracula">
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
<div><a href="/register" class="btn btn-ghost">register</a></div>
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
    <div></div>
</div>







@yield('content')





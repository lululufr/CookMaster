<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Blog Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">



    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

@if(session('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
         class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif

<body class="bg-white font-family-karla">

<!-- Top Bar Nav -->
<nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center">

        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                @auth

                    <li class="avatar">
                        <div class="w-9 rounded-full">
                            <img src="{{auth()->user()->profil_picture}}"/>
                        </div>
                    </li>
                    <li><a class="hover:bg-gray-400 rounded py-2 px-4 mx-2" href="/profil/{{auth()->user()->username}}">{{auth()->user()->username}}</a></li>
                    <li><a class="hover:bg-gray-400 rounded py-2 px-4 mx-2" href="/users/preferences">Préférence</a></li>
                    @if(auth()->user()->admin != 'user')
                        <li><a class="hover:bg-gray-400 rounded py-2 px-4 mx-2 text" href="/admin_choice">ADMIN</a></li>
                    @endif

                    @else

                    <li><a href="/register" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">register</a></li>
                    <li><a href="/login_page" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Se connecter</a></li>

                @endauth

            </ul>
        </nav>


                    <form class="" method="POST" action="/logout">
                        @csrf <!-- {{ csrf_field() }} -->
                        <button type="submit" class="hover:bg-red-600 rounded py-2 px-4 mx-2">Deconnexion</button>
                    </form>
        </div>


</nav>

<!-- Text Header -->
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="/">
            COOK WITH ME
        </a>
        <p class="text-lg text-gray-600">
            Cook together, cook better!
        </p>
    </div>
</header>

<!-- Topic Nav -->
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a
            href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open"
        >
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            <a href="/getevent" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Salles</a>
            <a href="/new_post" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Nouveau Post</a>

            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">A venir</a>
            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">A venir</a>
            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">A venir</a>

            <a href="/shop" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Boutique</a>
        </div>
    </div>
</nav>







@yield('content')




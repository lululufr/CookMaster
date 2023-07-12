<!DOCTYPE html>
<html lang="fr" data-theme="cmyk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookMaster</title>
    <meta name="author" content="Lucas MILLER">
    <meta name="description" content="Site de cuisine pour un projet etudiant">

    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeE-hEnAAAAAFMnwnaFL3fFx2VZFvEuM0RqB2qi"></script>





    <!-- Tailwind -->

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.1.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>



</head>

@if(session('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
         class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-blue-400 text-white px-8 py-4 rounded-lg shadow-lg">
        <p class="text-center">
            {{ session('message') }}
        </p>
    </div>
@endif

<body class="bg-white font-family-karla">

<!-- Top Bar Nav -->
<nav class="w-full py-4 bg-primary shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center">

        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                @auth

                    <li class="avatar">
                        <div class="w-9 rounded-full">
                            <img src="{{asset("storage/".auth()->user()->profil_picture)}}"/>
                        </div>
                    </li>
                    <li><a class="hover:bg-gray-400 rounded py-2 px-4 mx-2" href="/profil/{{auth()->user()->username}}">{{auth()->user()->username}}</a></li>

                    @if(auth()->user()->buying_plan != 'free')
                        <li><a class="hover:bg-gray-400 rounded py-2 px-4 mx-2" href="/conversation">{{ __("Messages") }}</a></li>
                    @endif

                    @if(auth()->user()->admin != 'user')
                        <li><a class="hover:bg-gray-400 rounded py-2 px-4 mx-2 text" href="/admin_choice">ADMIN</a></li>
                    @endif

                    @else

                    <li><a href="/register" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{__("S'inscrire")}}</a></li>
                    <li><a href="/login_page" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{__("Se connecter")}}</a></li>

                @endauth

            </ul>
        </nav>

                @auth
                    <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                        <li><a class="hover:bg-gray-400 rounded py-2 px-4 mx-2" href="/shop/cart/show">{{__("Panier")}}</a></li>
                    </ul>

                    <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                        <li><a class="hover:bg-gray-400 rounded py-2 px-4 mx-2" href="/plan">PLAN</a></li>
                    </ul>

                    <form class="" method="POST" action="/logout">
                        @csrf <!-- {{ csrf_field() }} -->
                        <button type="submit" class="hover:bg-red-600 rounded py-2 px-4 mx-2">{{__("Déconnexion")}}</button>
                    </form>
                @endauth
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

@auth
<nav class="w-full py-4 border-t border-b bg-gray-100 mb-5" x-data="{ open: false }">
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
            <a href="/getevent" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{__("Planning")}}</a>
            <a href="/recipe/create" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{__("Nouvelle recette")}}</a>

            <a href="/class" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{__("Formation")}}</a>
            <a href="/" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{__("Recette")}}</a>

            <a href="/shop" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{__("Boutique")}}</a>

            <a href="/live" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{__("Live")}}(BETA)</a>
        </div>
    </div>
</nav>
@endauth







@yield('content')




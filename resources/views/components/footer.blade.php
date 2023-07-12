
@yield('content')


<footer class="w-full border-t bg-white pb-12" style="position: fixed;bottom: 0">

    <div class="w-full container mx-auto flex flex-col items-center">
        <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
            <a href="#" class="uppercase px-3">{{ __("A propos")}}</a>
            <a href="#" class="uppercase px-3">{{__("Condition d'utilisation")}}</a>
            <a href="#" class="uppercase px-3">{{__("Nous contacter")}}</a>
        </div>
        <div class="uppercase pb-6">&copy; cookmaster.lululu.fr</div>
    </div>
</footer>

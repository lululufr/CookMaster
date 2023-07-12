<x-header/>



<div class="m-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">

    @if(auth()->user()->role == "admin")
    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/undraw_completed_03xt.svg" alt="Article" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Articles Administrations")}}</h2>
            <p>{{ __("Modifier et ajouter des articles dans la boutique")}} </p>
            <div class="card-actions justify-end">
                <a href="/admin/article" class="btn btn-primary">{{ __("Articles Administrations")}}</a>
            </div>
        </div>
    </div>
    @endif

        @if(auth()->user()->role == "admin")
    <div class="card  h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/salleadmindeco.svg" alt="Salles" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Salles Administrations")}}</h2>
            <p>{{ __("Gérez toutes nos salles disponible, ajoutez en si vous etes admin")}}</p>
            <div class="card-actions justify-end">
                <a href="/admin/room" class="btn btn-primary">{{ __("Salles Administrations")}}</a>
            </div>
        </div>
    </div>
        @endif

        @if(auth()->user()->role == "admin")
    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/eventdeco.svg" alt="User" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Utilisateur Administration")}}</h2>
            <p>{{ __("Gérez les utilisateurs, admin only !")}}</p>
            <div class="card-actions justify-end">
                <a href="/admin" class="btn btn-primary">{{ __("Utilisateur Administration")}}</a>
            </div>
        </div>
    </div>
        @endif


    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/undraw_cooking_p7m1.svg" alt="Formation" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Créer une formation")}}</h2>
            <p>{{ __("Créez une formation pour former de future cuisinier")}}</p>
            <div class="card-actions justify-end">
                <a href="/admin/new/class" class="btn btn-primary">{{ __("Formation Administration")}}</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/undraw_drink_coffee_jdqb.svg" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Créer un événement")}}</h2>
            <p>{{ __("Créez une événement pour former de future cuisinier")}}</p>
            <div class="card-actions justify-end">
                <a href="/admin/events" class="btn btn-primary">{{ __("Event Création")}}</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/mobilesearch.png" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Mon calendrier")}}</h2>
            <p>{{ __("Voir son calendrier de chef")}}</p>
            <div class="card-actions justify-end">
                <a href="/admin/chef/calendar" class="btn btn-primary">{{ __("Mon calendrier")}}</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/circuittag.png" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Les TAGS")}}</h2>
            <p>{{ __("Gérez les tags utilisables par les utilisateurs.")}}</p>
            <div class="card-actions justify-end">
                <a class="btn btn-primary" href='/admin/tags' >{{ __("tags")}}</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/phonecall.png" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Les Ingrédients")}}</h2>
            <p>{{ __("Gérez les ingrédients")}}</p>
            <div class="card-actions justify-end">
                <a class="btn btn-primary" href='/admin/ingredients' >{{ __("Ingrédients")}}</a>
            </div>
        </div>
    </div>

        @if(auth()->user()->role == "admin")
    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/yoga.png" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">{{ __("Les ustensiles")}}</h2>
            <p>{{ __("Gérez les outils et ustensiles")}}</p>
            <div class="card-actions justify-end">
                <a class="btn btn-primary" href='/admin/utensils'>{{ __("Ustensiles")}}</a>
            </div>
        </div>
    </div>
        @endif
</div>


<x-footer/>

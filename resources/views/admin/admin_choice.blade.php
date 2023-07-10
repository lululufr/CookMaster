<x-header/>



<div class="m-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">


    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/undraw_completed_03xt.svg" alt="Article" /></figure>
        <div class="card-body">
            <h2 class="card-title">Articles Administrations</h2>
            <p>Modifier et ajouter des articles dans la boutique </p>
            <div class="card-actions justify-end">
                <a href="/admin/article/create" class="btn btn-primary">Articles Administrations</a>
            </div>
        </div>
    </div>


    <div class="card  h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/salleadmindeco.svg" alt="Salles" /></figure>
        <div class="card-body">
            <h2 class="card-title">Salles Administrations</h2>
            <p>Gérez toutes nos salles disponible, ajoutez en si vous etes admin</p>
            <div class="card-actions justify-end">
                <a href="/admin/room" class="btn btn-primary">Salles Administrations</a>
            </div>
        </div>
    </div>


    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/eventdeco.svg" alt="User" /></figure>
        <div class="card-body">
            <h2 class="card-title">Utilisateur Administration</h2>
            <p>Gérez les utilisateurs, admin only !</p>
            <div class="card-actions justify-end">
                <a href="/admin" class="btn btn-primary">Utilisateur Administration</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/undraw_cooking_p7m1.svg" alt="Formation" /></figure>
        <div class="card-body">
            <h2 class="card-title">Créer une formation</h2>
            <p>Créez une formation pour former de future cuisinier</p>
            <div class="card-actions justify-end">
                <a href="/admin/new/class" class="btn btn-primary">Formation Administration</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/undraw_drink_coffee_jdqb.svg" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">Créer un événement</h2>
            <p>Créez une événement pour former de future cuisinier</p>
            <div class="card-actions justify-end">
                <a href="/event/create" class="btn btn-primary">Event Création</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/mobilesearch.png" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">Mon calendrier</h2>
            <p>Voir son calendrier de chef</p>
            <div class="card-actions justify-end">
                <a href="/admin/chef/calendar" class="btn btn-primary">Mon calendrier</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/circuittag.png" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">Les TAGS</h2>
            <p>Gérez les tags utilisables par les utilisateurs.</p>
            <div class="card-actions justify-end">
                <a class="btn btn-primary" href='/admin/tags' >tags</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/phonecall.png" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">Les Ingrédients</h2>
            <p>Gérez les ingrédients</p>
            <div class="card-actions justify-end">
                <a class="btn btn-primary" href='/admin/ingredients' >ingrédient</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/yoga.png" alt="Coffe" /></figure>
        <div class="card-body">
            <h2 class="card-title">Les ustensiles</h2>
            <p>Gérez les outils et ustensiles</p>
            <div class="card-actions justify-end">
                <a class="btn btn-primary" href='/admin/utensils'>ustensiles</a>
            </div>
        </div>
    </div>

</div>


<x-footer/>

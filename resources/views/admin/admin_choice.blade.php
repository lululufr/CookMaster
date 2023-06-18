<x-header/>



<div class="m-5 grid grid-cols-1 lg:grid-cols-2 gap-4 justify-items-center">


    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/undraw_completed_03xt.svg" alt="Shoes" /></figure>
        <div class="card-body">
            <h2 class="card-title">Articles Administrations</h2>
            <p>Modifier et ajouter des articles </p>
            <div class="card-actions justify-end">
                <a href="/admin/article/create" class="btn btn-primary">Articles Administrations</a>
            </div>
        </div>
    </div>


    <div class="card  h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/salleadmindeco.svg" alt="Shoes" /></figure>
        <div class="card-body">
            <h2 class="card-title">Salles Administrations</h2>
            <p>Gérez toutes nos salles disponible, ajoutez en si vous etes admin</p>
            <div class="card-actions justify-end">
                <a href="/admin/room" class="btn btn-primary">Salles Administrations</a>
            </div>
        </div>
    </div>


    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/eventdeco.svg" alt="Shoes" /></figure>
        <div class="card-body">
            <h2 class="card-title">Utilisateur Administration</h2>
            <p>Gérez les utilisateurs, admin only !</p>
            <div class="card-actions justify-end">
                <a href="/admin" class="btn btn-primary">Utilisateur Administration</a>
            </div>
        </div>
    </div>

    <div class="card h-96 w-96 bg-base-100 shadow-xl image-full">
        <figure><img src="images/deco/undraw_cooking_p7m1.svg" alt="Shoes" /></figure>
        <div class="card-body">
            <h2 class="card-title">Créer une formation</h2>
            <p>Créez une formation pour former de future cuisinier</p>
            <div class="card-actions justify-end">
                <a href="/admin/new/class" class="btn btn-primary">Formation Administration</a>
            </div>
        </div>
    </div>



    <a href="/event/create" class="hover:bg-red-600 rounded py-2 px-4 mx-2">Event Administrations</a>


</div>


<x-footer/>

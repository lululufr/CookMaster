<x-header/>


<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold">Création d'article</h1>
            <p class="py-6">Créer un article qui apparaitra dans la boutique.</p>
            <img src="/images/deco/undraw_shopping_app_flsj.svg"/>
        </div>
        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
            <div class="card-body">
                <form method="POST" action="/admin/article/create/apply" enctype="multipart/form-data">
                    @csrf
                    <input name="titre" class="input form-control" placeholder="Nom de l'article"/>
                    <label for="media">Image de couverture :</label>
                    <input class="file-input w-full max-w-xs" type="file" name="media"><br>
                    <input name="prix" class="input form-control" type="number" placeholder="prix"/>
                    <input name="discount" class="input form-control" type="number" placeholder="réduction"/>
                    <input name="nb" class="input form-control" type="number" placeholder="Nombre d'article"/>
                    <input name="tags" class="input form-control" placeholder="tags"/>
                    <input name="description" class="input form-control" placeholder="La description"/>

                    <button class="btn btn-primary" type="submit">Créer</button>
                </form>

            </div>
        </div>
    </div>
</div>


<x-footer/>

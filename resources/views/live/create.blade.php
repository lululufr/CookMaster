<x-header/>

<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold">Faites un LIVE</h1>
            <p class="py-6">Nous vous invitons a faire un super live. Entrez juste le nom de votre chaine, et c'est parti. </p>
        </div>
        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="/live/register" method="POST">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nom de la chaine (Case sensitif) </span>
                        </label>
                        <input type="text" placeholder="Chaine" name="chaine" class="input input-bordered" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Titre</span>
                        </label>
                        <input type="text" placeholder="titre" name="titre" class="input input-bordered" />
                    </div>

                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">LIVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<x-footer/>

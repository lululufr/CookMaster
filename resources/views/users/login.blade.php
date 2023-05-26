<x-header/>



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


<x-footer/>

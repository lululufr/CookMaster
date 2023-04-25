<x-header/>





<form method="POST" action="/users" class="grid justify-items-center m-4">

    @csrf

    <div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Quel est votre pseudo ?</span>
        <span class="label-text-alt">Top Right label</span>
    </label>
    <input name="username" type="text" placeholder="John B Le conquerant" class="input input-bordered w-full max-w-xs"/>
    
    @error('username')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
    @enderror

    </div>

    <div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Quel est votre email ?</span>
        <span class="label-text-alt">Top Right label</span>
    </label>
    <input name="email" type="text" placeholder="John.conquerant@braveheart.fr" class="input input-bordered w-full max-w-xs" />
    @error('email')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
    @enderror
    </div>

    <div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Veuillez choisir un mot de passe?</span>
        <span class="label-text-alt">Top Right label</span>
    </label>
    <input name="password" type="password" placeholder="azerty123!" class="input input-bordered w-full max-w-xs" />
        @error('password')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
        @enderror
    </div>

        <div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Veuillez confirmer votre mdp?</span>
        <span class="label-text-alt">Top Right label</span>
    </label>
    <input name="password_confirmation" type="password" placeholder="azerty123!" class="input input-bordered w-full max-w-xs" />
        @error('password_confirmation')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>






<x-footer/>


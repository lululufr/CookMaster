<x-header/>





<form method="POST" action="/users" class="grid justify-items-center m-4">

    @csrf

    <h3 class="font-bold text-lg">Création de compte</h3>
    <div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Quel est votre pseudo ?</span>
    </label>
    <input value="{{old('username')}}" name="username" type="text" placeholder="John B Le conquerant" class="input input-bordered w-full max-w-xs"/>

    @error('username')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
    @enderror
    </div>
<div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Quel est votre prénom ?</span>
    </label>
    <input value="{{old('firstname')}}" name="firstname" type="text" placeholder="John" class="input input-bordered w-full max-w-xs"/>

    @error('firstname')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
    @enderror
    </div>
<div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Quel est votre nom ?</span>
    </label>
    <input value="{{old('lastname')}}" name="lastname" type="text" placeholder="Snow" class="input input-bordered w-full max-w-xs"/>

    @error('lastname')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
    @enderror
    </div>


    <div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Quel est votre email ?</span>
    </label>
    <input value="{{old('email')}}" name="email" type="text" placeholder="John.conquerant@braveheart.fr" class="input input-bordered w-full max-w-xs" />

    @error('email')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
    @enderror
    </div>

    <div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Choisir un mot de passe</span>
    </label>
    <input value="{{old('password')}}" name="password" type="password" placeholder="azerty123!" class="input input-bordered w-full max-w-xs" />
        @error('password')
            <label class="label">
                <span class="label-text-alt">{{$message}}</span>
            </label>
        @enderror
    </div>

        <div class="form-control w-full max-w-xs m-5">
    <label class="label">
        <span class="label-text">Confirmer votre mot de passe</span>
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


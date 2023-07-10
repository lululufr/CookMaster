<x-header/>




        <form method="POST" action="/login" class="grid justify-items-center m-4">
            @csrf
            <h3 class="font-bold text-lg">{{__("Veuillez saisir vos identifiants")}} </h3>
            <div class="form-control w-full max-w-xs m-5">
                <input value="{{old('username')}}" name="username" type="text" placeholder="Username" class="input input-bordered w-full max-w-xs"/>

                @error('username')
                <label class="label">
                    <span class="label-text-alt">{{$message}}</span>
                </label>
                @enderror
            </div>
            <div class="form-control w-full max-w-xs m-5">
                <input value="{{old('password')}}" name="password" type="password" placeholder="Mot de passe" class="input input-bordered w-full max-w-xs" />
                @error('password')
                <label class="label">
                    <span class="label-text-alt">{{$message}}</span>
                </label>
                @enderror
            </div>

            <button type="submit" class="btn btn-ghost">{{__("Se connecter")}}</button>
        </form>

        <div class="modal-action">
            <label for="login_modal" class="btn">Annuler</label>
        </div>



<x-footer/>

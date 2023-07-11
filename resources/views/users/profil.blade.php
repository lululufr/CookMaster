@if(session('message'))
    <div class="alert alert-success">
        Profil modifiés avec succes
    </div>
@endif
<x-header/>
<div class="form-control grid justify-items-center m-4 w-full max-w-xs">


    <a href="/user/pref" class="btn">MES ELEMENTS.</a>


    <h2>PLAN actuelle : {{auth()->user()->buying_plan}}.</h2>
    <h2>Vous avez regardez {{auth()->user()->nb_classes}} chapitre de formation aujourd'hui.</h2>






        <div class="avatar">
            <div class="w-24 rounded-full">
                <img src="{{asset("storage/".$infos['profil_picture'])}}"/>
            </div>
        </div>
        <button class="btn" onclick="modal_pp.showModal()">Changer photo de profile</button>



        <dialog id="modal_pp" class="modal">
            <div method="dialog" class="modal-box">
                <form method="post" action="/users/preferences/pp/change/{{auth()->user()->id}}" enctype="multipart/form-data">
                    @csrf
                <h3 class="font-bold text-lg">Changer votre photo de profil</h3>
                <p class="py-4">Press ESC key or click the button below to close</p>

                <input type="file" name="media" class="file-input w-full max-w-xs"/>

                <div class="modal-action">
                    <!-- if there is a button in form, it will close the modal -->
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                </form>
            </div>
        </dialog>

    <form method="POST" action="/users/preferences/change" class="form">
        @csrf

        <div class="form-control w-full max-w-xs m-5">
            <label>Pseudonyme</label>
            <input type="text" name="username" value="{{$infos['username']}}"
                   class="input w-full max-w-xs
                          @error('pseudonyme') is-invalide @enderror"/>

            @error('pseudonyme')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control w-full max-w-xs m-5">
        <label>Prénom</label>
            <input type="text" name="firstname" value="{{$infos['firstname']}}"
                   class="input w-full max-w-xs
                         @error('firstname') is-invalide @enderror"/>

            @error('firstname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full max-w-xs m-5">
        <label >Nom</label>
            <input type="text" name="lastname" value="{{$infos['lastname']}}"
                   class="input w-full max-w-xs
                         @error('lastname') is-invalide @enderror"/>

            @error('lastname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full max-w-xs m-5">
        <label >E-mail</label>
        <input type="text" name="email" value="{{$infos['email']}}"
               class="input w-full max-w-xs
                     @error('email') is-invalide @enderror"/>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>


        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

<div>
    <p>Language</p>

    <a class="btn" href="/locale/en">English</a>
    <a class="btn" href="/locale/fr">Francais</a>
    <a class="btn" href="/locale/de">Allemand</a>
    <a class="btn" href="/locale/ch">中国人</a>

</div>


</div>


<div>Dernière modification : {{$infos['updated_at']}}</div>
<div>Compte créé le : {{$infos['created_at']}}</div>


<x-footer/>

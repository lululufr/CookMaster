<x-header/>



<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row">
        <img src="{{asset("storage/".$infos['profil_picture'])}}" class="max-w-sm rounded-lg shadow-2xl mr-5" onclick="modal_pp.showModal()"/>
        <div>
            <h1 class="text-5xl font-bold">Profile</h1>



            <a href="/user/pref" class="btn">MES ELEMENTS.</a>
            <p>Plan actuelle : <b>{{auth()->user()->buying_plan}}</b>.</p>
            <p>Vous avez regardez <b> {{auth()->user()->nb_classes}} </b> chapitre de formation aujourd'hui.</p>



            <form method="POST" action="/users/preferences/change" class="m-5">
                @csrf

                <div class="form-control">
                    <label>Pseudonyme</label>
                    <input type="text" name="username" value="{{$infos['username']}}"
                           class="input w-full max-w-xs
                          @error('pseudonyme') is-invalide @enderror"/>

                    @error('pseudonyme')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control">
                    <label>Prénom</label>
                    <input type="text" name="firstname" value="{{$infos['firstname']}}"
                           class="input w-full max-w-xs
                         @error('firstname') is-invalide @enderror"/>

                    @error('firstname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control">
                    <label >Nom</label>
                    <input type="text" name="lastname" value="{{$infos['lastname']}}"
                           class="input w-full max-w-xs
                         @error('lastname') is-invalide @enderror"/>

                    @error('lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control">
                    <label >E-mail</label>
                    <input type="text" name="email" value="{{$infos['email']}}"
                           class="input w-full max-w-xs
                     @error('email') is-invalide @enderror"/>

                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary m-5">MODIFIER</button>
            </form>



            <div class="card">

                <div>Changer langage :</div>

                <a class="btn" href="/locale/en">English</a>
                <a class="btn" href="/locale/fr">Francais</a>
                <a class="btn" href="/locale/de">Allemand</a>
                <a class="btn" href="/locale/ch">中国人</a>

            </div>

            <div>Dernière modification : {{$infos['updated_at']}}</div>
            <div>Compte créé le : {{$infos['created_at']}}</div>

        </div>
    </div>
</div>


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






</div>



<x-footer/>

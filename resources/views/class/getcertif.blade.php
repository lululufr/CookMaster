<x-header/>



<div class="hero min-h-screen" style="background-image: url('/images/stock/photo-1507358522600-9f71e620c44e.jpg');">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">BRAVO</h1>
            <p class="mb-5">Vous venez de valider entierement la formation : {{$class->title}}</p>
            <a href="/class/getcertification/{{$class->id}}" class="btn btn-primary">Téléchargez votre certificat ici !!</a>
        </div>
    </div>
</div>


<x-footer/>

<x-header/>

@php($tt = 0)

<div class="grid grid-cols-6">

    @foreach($carts as $cart)
        @php($tt += $cart->articles->prix)
        <div class="card bg-base-300">
            <div class="card-body">
                <p>Article n° : {{$cart->articles->id}}</p>
                <p>Nom : ° {{$cart->articles->titre}}</p>
                <p>Prix : {{$cart->articles->prix}} €</p>
            </div>
        </div>
    @endforeach
</div>
    <p>TOTAL : {{$tt}} € </p>

    <a class="btn btn-primary" href="/pay">PAYER</a>


<x-footer/>

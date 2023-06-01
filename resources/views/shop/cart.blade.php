<x-header/>

@php($tt = 0)

@foreach($carts as $cart)
    @php($tt += $cart->articles->prix)
    <div>
        <p>{{$cart->articles->id}}</p>
        <p>{{$cart->articles->titre}}</p>
        <p>{{$cart->articles->prix}}</p>

    </div>




@endforeach

    <p>TOTAL : {{$tt}}</p>
    <a href="/pay">PAYER</a>

<x-footer/>

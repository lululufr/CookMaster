<x-header/>

@php($tt = 0)

<div class="grid place-content-center place-item-center">
    <h1 class="text-5xl font-bold">{{__("Panier")}}</h1>






    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th>Prix :</th>
                <th>Article n°</th>
                <th>Nom : °</th>

            </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
                @php($tt += $cart->articles->prix)

                <tr>
                    <th>{{$cart->articles->prix}} €</th>
                    <td>{{$cart->articles->id}}</td>
                    <td>{{$cart->articles->titre}}</td>

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>


    <div class="stat">
        <div class="stat-title">A PAYER :</div>


        @if(auth()->user()->buying_plan != 'free')

            <b>Livraison offerte. </b>
            @if(auth()->user()->buying_plan == 'master')
                @php($tt =($tt * 0.9))
                <b>TOTAL -10% avec master plan : {{$tt}} € </b>
            @endif

        @else
            @php($tt =($tt + 10))
            <b class="">Livraison + 10 €</b>
            <div class="stat-value">{{$tt}} €</div>
        @endif





        <div class="stat-actions">
            <a class="btn btn-primary" href="/pay">PAYER</a>
        </div>
    </div>


</div>

</div>
<x-footer/>

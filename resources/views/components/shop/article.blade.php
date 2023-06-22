
<div>

    <div class="mx-4">
        <div class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                     src="{{$img}}"/>

                <h3 class="text-2xl mb-2">

                </h3>
                <div class="text-xl font-bold mb-4">{{$tags}}</div>

                <div>
                    {{$prix}}

                    discount : {{$discount}}
                </div>

                <div>
                    <a href="/shop/cart/add/{{$id}}">ACHETER</a>
                </div>

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$nb}} articles restants
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">{{$titre}}</h3>
                    <div class="text-lg space-y-6">
                        {{$description}}
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

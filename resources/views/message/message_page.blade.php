<x-header/>

<div class="overscroll-contain">

    @foreach($messages as $message)
        <div class=" box-content place-content-stretch flex-auto p-4 border-4 box-decoration-slice bg-gradient-to-r from-blue-600 to-indigo-400 text-white px-2 m-2">

            {{$message->content}}
        </div>
    @endforeach

</div>

<div>
    <form method="POST" action="/message/{{$id}}/send">
        @csrf

        <input type="text" id="text" name="message"/>

        <button type="submit">
            Envoyer
        </button>

    </form>
</div>

<x-footer/>

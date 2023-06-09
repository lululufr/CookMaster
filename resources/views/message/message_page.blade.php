<x-header/>


@foreach($messages as $message)
    <div>
    {{$message->content}}
        @if($message->to_id == auth()->user()->id)
            MOI
        @else
            recu
        @endif
    </div>

@endforeach



<form method="GET" action="/message/afficher">

    <input type="text" id="idmessage" name="message"/>

    <button type="submit">Envoyer</button>

</form>


<x-footer/>

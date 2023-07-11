<x-header/>


<div class='flex items-center justify-center bg-base-300 p-4'>
    <div class='text-center'>
        <h1 class='font-bold mb-2'>{{app\Models\User::where('id',$id)->first()->username}}</h1>
        <p class='text-gray-700'>{{app\Models\User::where('id',$id)->first()->username}} est un {{app\Models\User::where('id',$id)->first()->role}}</p>
        <a href='/profil/{{app\Models\User::where('id',$id)->first()->username}}' class='text-blue-500 underline mt-4'>Voir le profil</a>
    </div>
</div>

<div class="overscroll-contain">

    @foreach($messages as $message)

        @if($id == $message->user_from->id)

            <div class="chat chat-end">
                <div class="chat-image avatar">
                    <div class="w-10 rounded-full">
                        <img src="{{asset("storage/".$message->user_from->profil_picture)}}"/>
                    </div>
                </div>
                <div class="chat-bubble"> {{$message->content}}</div>
            </div>

            @else
        <div class="chat chat-start">
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img src="{{asset("storage/".$message->user_from->profil_picture)}}" />
                </div>
            </div>
            <div class="chat-bubble"> {{$message->content}}</div>
        </div>
        @endif
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

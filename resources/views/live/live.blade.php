<x-header/>

<!-- Add a placeholder for the Twitch embed -->

<div class="grid place-content-center place-items-center m-5">
    @if($live->user_id == Auth::user()->id)

        @if($live->onlive == 0)
            <a class="btn btn-sucess" href="/live/setonline">PASSER EN LIGNE</a>
        @else
            <a class="btn btn-danger" href="/live/setoffline">PASSER EN HORS LIGNE</a>
        @endif

    @endif
</div>

<div class="hero min-h-screen bg-base-200">

    <div class="hero-content flex-col lg:flex-row-reverse">

        <div class="text-center lg:text-left">
            <div id="twitch-embed"></div>
        </div>
        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
            <div class="card-body">
                <iframe
                    id="chat_embed"
                    src="https://www.twitch.tv/embed/{{$live->link}}/chat?parent=cookmaster.lululu.fr"
                    height="500"
                    width="350">
                </iframe>
            </div>
        </div>
    </div>
</div>




<!-- Load the Twitch embed script -->
<script src="https://player.twitch.tv/js/embed/v1.js"></script>

<!-- Create a Twitch.Player object. This will render within the placeholder div -->
<script type="text/javascript">
    new Twitch.Player("twitch-embed", {
        width: 854,
        height: 480,
        channel: "{{$live->link}}"
    });
</script>



<x-footer/>

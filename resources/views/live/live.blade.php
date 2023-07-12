<x-header/>

<!-- Add a placeholder for the Twitch embed -->
<div id="twitch-embed"></div>

<!-- Load the Twitch embed script -->
<script src="https://player.twitch.tv/js/embed/v1.js"></script>

<!-- Create a Twitch.Player object. This will render within the placeholder div -->
<script type="text/javascript">
    new Twitch.Player("twitch-embed", {
        channel: "{{$live->link}}"
    });
</script>

<iframe
    id="chat_embed"
    src="https://www.twitch.tv/embed/"{{$live->link}}"/chat?parent=www.example.com"
    height="500"
    width="350">
</iframe>

<x-footer/>

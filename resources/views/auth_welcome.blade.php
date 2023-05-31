<x-header/>

<div class="flex flex-content">
    @foreach($posts as $post)

        <x-posts.card_posts

        content="{{$post->content}}"
        tags="{{ $post->tags}}"

        time="{{$post->created_at}}"

        img="{{$post->image_path}}"

        titre="{{$post->titre}}"/>

        <!--username="//$post->User->username"-->


    @endforeach

</div>
<x-footer/>

<x-header/>
@php(\App\Http\Controllers\AdsController::ads())


<div class="grid flex flex-content">
    @foreach($posts as $post)
        <x-posts.card_posts
            :content="$post->content"
            :tags="$post->tags"
            :time="$post->created_at"
            :img="$post->image_path"
            :titre="$post->titre"
        />
    @endforeach

</div>

@php(\App\Http\Controllers\AdsController::ads())

<x-footer/>

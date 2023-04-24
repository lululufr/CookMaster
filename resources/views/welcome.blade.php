<x-header/>

    @section('content')
    <h1>{{ $heading }}</h1>

    <h2>
    @foreach($posts as $post)
        {{ $post['id']}}
        {{$post['content']}}
    @endforeach
    </h2>

<x-footer/>
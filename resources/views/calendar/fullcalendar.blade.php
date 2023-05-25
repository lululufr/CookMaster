<x-header/>

@foreach($events as $event)
    {{$event->title}}
    {{$event->rooms->city}}
    {{$event->rooms->street}}
@endforeach


<x-footer/>

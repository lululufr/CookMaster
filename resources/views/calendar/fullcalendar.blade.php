<x-header/>

@foreach($events as $event)
    {{$event->title}}
    {{$event->rooms->city}}
    {{$event->rooms->street}}
@endforeach

<div id="calendar"></div>

<x-footer/>

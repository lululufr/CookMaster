<x-header/>
<div class="card-actions justify-end">
    <a href="/event/create" class="btn btn-primary">{{ __("Event Création")}}</a>
</div>
<div class="overflow-x-auto w-full">
    <table class="table w-full">
        <!-- head -->
        <thead>
        <tr>
            <th>title</th>
            <th>chef username</th>
            <th>is validated</th>
            <th>max participants</th>
            <th>start</th>
            <th>duration</th>
            <th>room_id</th>
            <th>recipe_id</th>
            <th>recipe_id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{$event->title}}</td>
                <td>{{$event->chef_username}}</td>
                <td>{{$event->is_validated}}</td>
                <td>{{$event->max_participants}}</td>
                <td>{{$event->start}}</td>
                <td>{{$event->duration}}</td>
                <td>{{$event->room_id}}</td>
                <td>{{$event->recipe_id}}</td>
                <td>
                    <form action="/event/delete/{{$event->id}}" method="post">
                        @csrf
                        <button class="btn btn-error">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>








<x_footer/>

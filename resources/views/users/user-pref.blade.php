<x-header/>


<?php
use App\Models\Event;

$calendar = [
    'Monday' => [],
    'Tuesday' => [],
    'Wednesday' => [],
    'Thursday' => [],
    'Friday' => [],
    'Saturday' => [],
    'Sunday' => [],
];

usort($events, function($a, $b) {
    return strtotime($a['start']) - strtotime($b['start']);
});

foreach ($events as $event) {
    $day = date('l', strtotime($event['start']));
    $calendar[$day][] = $event;
}
?>

<div class="grid flex grid-rows-7 grid-flow-col gap-4">
    <?php
    $cpt = 0;
    foreach ($calendar as $day => $events) {
        echo '<div class="grid grid-cols w-42 justify-items-center" >';
        echo '<h1 class="">' . $day . '</h1>';
    foreach ($events as $event) {
        ?>

    <div class="box-content place-content-stretch flex-auto w-64

        <?php echo 'h-'.$event['duration'] * 16?>

        w-42 p-4 border-4 box-decoration-slice bg-gradient-to-r from-blue-600 to-indigo-400 text-white px-2 m-2 " <?php echo 'onclick="my_modal'.$event["id"].'.showModal()"';?>>
        <p><?php echo $event['title'];?></p>
        <p><?php echo $event['start']; ?></p>
        <p><?php echo $event['rooms_id']; ?></p>


        <p><?php echo strtotime($event['start']) - time()?></p> <!-- si event passé-->

        <p><?php echo strtotime($event['start']) % 24 ?></p> <!-- Pour placer les events-->
    </div>


    <dialog id="my_modal{{$event["id"]}}" class="modal">
            <?php
            $isParticipating = \App\Models\EventParticipates::where('event_id', $event['id'])
                ->where('user_id', Auth::id())
                ->exists();
            ?>
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">{{$event["title"]}}</p>
            <p class="py-4">{{$event["description"]}}</p>
                <?php //si l'event a dépassé le nombre de participants max
            if($event["max_participants"] <= \App\Models\EventParticipates::where('event_id', $event['id'])->count()){?>
            <button class="btn" >Cet évènement est complet</button>
            <?php }else{?>
            <form method="POST" action="/eventParticipate">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event['id'] }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div>
                    <button class="btn" type="submit"><?php echo $isParticipating? 'Se désinscrire':'Participer' ?></button>
                </div>
            </form>
            <?php } ?>
            <form method="dialog">
                <div class="modal-action">
                    <button class="btn">Annuler</button>
                </div>
            </form>
        </div>
    </dialog>
    <?php }
        echo '</div>';
    }
    ?>
</div>



FORMATION CREEE
<div class="m-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

    @foreach($formations as $class)

        <div class="card bg-base-100 shadow-xl image-full mb-4">
            <figure>
                <img src="{{$class->img}}" alt="Cuisine" class="img-fluid">
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{$class->name}}</h2>
                <p>{{$class->description}}</p>
                <b>Formation réalisée par le chef {{$class->chef->username}}</b>
                <div class="card-actions justify-end">

                    <form action="/class/{{$class->id}}/show" method="GET">
                        @csrf
                        <button class="btn btn-primary">Suivre la formation</button>

                    </form>

                    @if($class->chef->id == auth()->user()->id)
                        <a href="/class/{{$class->id}}/edit" class="btn">Modifier la formation</a>
                    @endif

                </div>
            </div>
        </div>

    @endforeach

</div>

FORMATION ACHETEE
<div class="m-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

    @foreach($ownformations as $class)

        <div class="card bg-base-100 shadow-xl image-full mb-4">
            <figure>
                <img src="{{$class->img}}" alt="Cuisine" class="img-fluid">
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{$class->name}}</h2>
                <p>{{$class->description}}</p>
                <b>Formation réalisée par le chef {{$class->chef->username}}</b>
                <div class="card-actions justify-end">

                    <form action="/class/{{$class->id}}/show" method="GET">
                        @csrf
                        <button class="btn btn-primary">Suivre la formation</button>

                    </form>

                    @if($class->chef->id == auth()->id())
                        <a href="/class/{{$class->id}}/edit" class="btn">Modifier la formation</a>
                    @endif

                </div>
            </div>
        </div>

    @endforeach

</div>


<x-footer/>

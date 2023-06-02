<x-header/>











<div>
    <form action="/getevent" method="get" class="form" id="rech">
        @csrf

        <input type="text" name="rech" id="rech" class="input" placeholder="Rechercher">
        <button type="submit" value="submit">Submit</button>
    </form>
</div>


<label for="rooms">Choose a car:</label>
    <select name="rooms" id="rooms" form="rech">

        @foreach(\App\Models\Rooms::all() as $room)
            <option value="{{$room->id}}">{{$room->street}}</option>
        @endforeach
    </select>



<?php


use App\Models\Event;

//$events = Event::all()->toArray();

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

foreach ($calendar as $day => $events) {
    echo '<div class="grid grid-cols w-42 justify-items-center ">';
    echo '<h1 class="">' . $day . '</h1>';
    foreach ($events as $event) {
        ?>

        <div class="box-content place-content-stretch flex-auto w-64

        <?php echo 'h-'.$event['duration'] * 16?>

        w-42 p-4 border-4 box-decoration-slice bg-gradient-to-r from-blue-600 to-indigo-400 text-white px-2 m-2">
            <p><?php echo $event['title'];?></p>
            <p><?php echo $event['start']; ?></p>
            <p><?php echo $event['rooms_id']; ?></p>


            <p><?php echo strtotime($event['start']) - time()?></p> <!-- si event passé-->

            <p><?php echo strtotime($event['start']) % 24 ?></p> <!-- Pour placer les events-->
        </div>

        <?php
    }
    echo '</div>';
}
?>
</div>










<x-footer/>

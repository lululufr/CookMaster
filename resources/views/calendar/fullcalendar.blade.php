<x-header/>



<?php


use App\Models\Event;

$events = Event::all()->toArray();

$calendar = [
    'Monday' => [],
    'Tuesday' => [],
    'Wednesday' => [],
    'Thursday' => [],
    'Friday' => [],
];

usort($events, function($a, $b) {
    return strtotime($a['start']) - strtotime($b['start']);
});

foreach ($events as $event) {
    $day = date('l', strtotime($event['start']));
    $calendar[$day][] = $event;
}

foreach ($calendar as $day => $events) {
    echo '<h1>' . $day . '</h1>';
    foreach ($events as $event) {
        echo '<p>' . $event['title'] . '</p>';
        echo '<p>' . $event['start'] . '</p>';
        echo '<p>' . $event['duration'] . '</p>';
    }
}



?>











<x-footer/>


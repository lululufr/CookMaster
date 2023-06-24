<x-header/>
<?php use Illuminate\Support\Facades\Auth;

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
            //variable pour savoir si le chef a validé l'event

                ;
            ?>
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">{{$event["title"]}}</p>
            <p class="py-4">{{$event["description"]}}</p>

            <form method="POST" action="/admin/event/activation">
                @csrf
                <input type="hidden" name="id" value="{{$event["id"]}}">
                <div>
                    <button class="btn" type="submit"><?php echo $event["is_validated"]? 'Annuler':'Confirmer' ?></button>
                </div>
            </form>
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

<x-footer/>


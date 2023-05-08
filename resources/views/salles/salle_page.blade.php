<x-header/>

<div>
choix de la salle
</div>
<div>
    Salle 1
</div>


<div class="grid w-full">
    <div class="overflow-x-auto p-a m-5">
        <table class="table w-full table-compact ">
            <!-- head -->
            <thead>
            <tr >
                <th>horraire</th>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th>
                <th>Dimanche</th>
            </tr>
            </thead>
            <tbody >
                @for($i=8;$i<24;$i=$i+2)
                    <tr>
                        <th>{{$i}} H</th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                        <th>Samedi</th>
                        <th>Dimanche</th>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>


<x-footer/>

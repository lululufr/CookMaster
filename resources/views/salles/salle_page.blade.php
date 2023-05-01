<x-header/>


<div class="grid w-80">
    <div class="overflow-x-auto ">
        <table class="table w-full table-compact ">
            <!-- head -->
            <thead>
            <tr>
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
            <tbody>
                @for($i=0;$i<10;$i=$i+2)
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

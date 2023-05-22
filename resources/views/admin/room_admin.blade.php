<x-header/>


<div class="overflow-x-auto w-full">
    <table class="table w-full">
        <!-- head -->
        <thead>
        <tr>
            <th>
                <label>
                    Ville
                </label>
            </th>
            <th>ID</th>
            <th>Rue</th>
            <th>Code Postal</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>



        @foreach($rooms as $room)
            <tr>
                <x-admin.room_admin

                    id="{{$room->id}}"
                    street="{{$room->street}}"
                    city="{{$room->city}}"
                    postalcode="{{$room->postal_code}}"
                    description="{{$room->description}}"

                    tag="{{$room->tags}}"

                />
            </tr>
        @endforeach
        </tbody>
    </table>
</div>








<x_footer/>

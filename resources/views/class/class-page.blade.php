<x-header/>

            <div class="m-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                    @foreach($classes as $class)

                            <div class="card bg-base-100 shadow-xl image-full mb-4">
                                <figure>
                                    <img src="{{$class->img}}" alt="Cuisine" class="img-fluid">
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title">{{$class->name}}</h2>
                                    <p>{{$class->description}}</p>
                                    <b>Formation réalisée par le chef {{$class->chef->username}}</b>
                                    <div class="card-actions justify-end">

                                        <form action="/class/show" method="GET">
                                            @csrf
                                            <button class="btn btn-primary">Suivre la formation</button>

                                        </form>


                                    </div>
                                </div>
                            </div>

                    @endforeach

            </div>



<x-footer/>

<x-header/>


@foreach($classes as $class)

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{$class->name}}</h1>
                    <p>{{$class->description}}</p>
                    <p>{{$class->chapter}}</p>
                </div>
            </div>
        </div>

@endforeach

<x-footer/>

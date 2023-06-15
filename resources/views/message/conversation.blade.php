<x-header/>



@foreach($conversation as $conv)
    <div class="card w-96 bg-primary shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Card title!</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Envoyer Message</button>
            </div>
        </div>
    </div>
@endforeach

<x-footer/>

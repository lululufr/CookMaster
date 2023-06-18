<x-header/>

<h1 class="uppercase text-5xl font-bold m-5">{{$chapters[0]->classes->title}}</h1>

{{ $chapters->links() }}


<div class="m-5">




        @foreach($chapters as $chapter)


            @if($chapter->type == "question")

            <div class="hero min-h-screen bg-base-200">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold">Questionnaire</h1>

                        @if(\App\Models\Validateds::where('user_id', auth()->user()->id)->where('chapters_id', $chapter->id)->first())
                            <div class="hero min-h-screen bg-base-200">
                                <div class="hero-content text-center">
                                    <div class="max-w-md">
                                        <h1 class="text-5xl font-bold">Vous avez validé ce questionnaire</h1>
                                        <img src="/images/deco/coeurbleucontentmieux.svg" alt="Cuisine" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        @else
                            <form action="/class/{{$chapter->id}}/check" method="POST">
                    @csrf
                    @foreach(\App\Models\Questions::where('chapters_id', $chapter->id)->get() as $question)

                        @if($question->type == "libre")
                                <p class="py-6">{{$question->question}}</p>

                                <input type="text" name="answer-{{$question->id}}" placeholder="Votre reponse">

                            @elseif($question->type == "qcm")


                                <div class="question">
                                    {{$question->question}}
                                </div>


                                <div class="options">

                                    @if($question->choix1 != null)
                                        <div class="option">
                                            <label>
                                                <input type="radio" name="answer-{{$question->id}}" value="{{$question->choix1}}">
                                                {{$question->choix1}}
                                            </label>
                                        </div>
                                    @endif
                                    @if($question->choix2 != null)
                                        <div class="option">
                                            <label>
                                                <input type="radio" name="answer-{{$question->id}}" value="{{$question->choix2}}">
                                                {{$question->choix2}}
                                            </label>
                                        </div>
                                        @endif
                                        @if($question->choix3 != null)
                                            <div class="option">
                                                <label>
                                                    <input type="radio" name="answer-{{$question->id}}" value="{{$question->choix3}}">
                                                    {{$question->choix3}}
                                                </label>
                                            </div>
                                        @endif
                                        @if($question->choix4 != null)
                                            <div class="option">
                                                <label>
                                                    <input type="radio" name="answer-{{$question->id}}" value=" {{$question->choix4}}">
                                                    {{$question->choix4}}
                                                </label>
                                            </div>
                                        @endif

                                        </div>



                        @endif
                    @endforeach
                    <div>
                        <button class="btn" type="submit">Valider</button>
                    </div>
                </form>
                        @endif

                    </div>
                </div>
            </div>



        @elseif($chapter->type == "lecon")
            <div class="hero min-h-screen bg-base-200">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold">{{$chapter->title}}</h1>
                        <p class="py-6">{{$chapter->content}}</p>

                        <img src="{{$chapters[0]->classes->img}}" alt="Cuisine" class="img-fluid">


                        <video controls>
                            <source src="/images/classes/video/videodetestsurlesramen.mp4" type="video/mp4">

                            Télécharger la video the
                            <a href="/images/classes/video/videodetestsurlesramen.mp4">mp4</a>
                        </video>


                        <p class="py-6">{{$chapter->tags}}</p>

                    </div>
                </div>
            </div>
        @endif
@endforeach
<div class="m-5">
    <a class="btn" href="/class/{{$chapters[0]->classes->id}}/certif/check">OBTENIR MA CERTIFICATION</a>
</div>

</div>








<x-footer/>

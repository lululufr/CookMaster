<x-header/>


<?php $cmp =0; ?>
@foreach($chapters as $chapter)
    <?php $cmp++; ?>

    @if($chapter->type == "lecon")

        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content flex-col lg:flex-row">
                @if(isset($chapter->media))
                    <img src="{{asset("storage/".$chapter->media)}}" alt="Cuisine" class="img-fluid w-3/5">
                @endif
                <div>
                    <form class ="flex grid grid-cols-1 place-content-center place-items-center" action="/class/chapter/{{$chapter->id}}/edit/submit" method="POST">
                        @csrf
                        <h1 class="text-5xl font-bold">Chapitre <?php echo $cmp ?></h1>
                        <input class="textarea w-full input" type="text" name="title" placeholder="{{ $chapter->title }}" value="{{ $chapter->title }} " required>
                        <textarea class="textarea w-full place-content-center place-items-center" name="content" placeholder="Description de la formation" required>
                            {{ $chapter->content }}
                        </textarea>
                        <button class="btn btn-primary" type="submit">Modifier ce chapitre</button>
                    </form>
                </div>
            </div>
        </div>

        @elseif($chapter->type == "question")



            <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 place-content-center place-items-center" >

            @foreach(\App\Models\Questions::where('chapters_id',$chapter->id)->get() as $question)
                    <div class="card bg-base-300 p-0 ">
                        <p class="card-title">Question : </p>
                        <p class="card-body">{{$question->question}}<p/>
                        <p class="card-title">Reponse : </p>
                        <p class="card-body">{{$question->reponse}}<p/>
                    </div>

            @endforeach
            </div>
            <a href="/class/{{$chapter->id}}/delform" class="btn btn-danger" type="submit">Supprimer questionnaire</a>

        @endif

@endforeach



<button class="btn place-content-center place-items-center" onclick="modal_form.showModal()">AJOUTER QUESTIONNAIRE</button>


<dialog id="modal_form" class="modal">
    <form action="/class/{{$class_id}}/addform" id="dynamic-form" method="POST" class="modal-box w-11/12 max-w-5xl">
@csrf
        <div id="question-container"></div>
        <button class="btn" type="submit">ENVOYER QUESTIONNAIRE</button>

        <button class="btn" type="button" id="add-question-btn">Ajouter une question</button>

    </form>
</dialog>


<script>
    const questionContainer = document.getElementById('question-container');
    const addQuestionBtn = document.getElementById('add-question-btn');
    let questionCount = 1;

    addQuestionBtn.addEventListener('click', () => {
        const questionDiv = document.createElement('div');
        questionDiv.className = 'question';

        const questionLabel = document.createElement('label');
        questionLabel.htmlFor = `question-input-${questionCount}`;
        questionLabel.textContent = 'Question :';

        const questionInput = document.createElement('input');
        questionInput.type = 'text';
        questionInput.id = `question-input-${questionCount}`;
        questionInput.name = `questions[${questionCount - 1}][question]`;
        questionInput.className = 'input w-full max-w-xs';

        const answerLabel = document.createElement('label');
        answerLabel.htmlFor = `answer-input-${questionCount}`;
        answerLabel.textContent = 'Réponse :';

        const answerInput = document.createElement('input');
        answerInput.type = 'text';
        answerInput.id = `answer-input-${questionCount}`;
        answerInput.name = `questions[${questionCount - 1}][answer]`;
        answerInput.className = 'input w-full max-w-xs';

        questionDiv.appendChild(questionLabel);
        questionDiv.appendChild(questionInput);
        questionDiv.appendChild(answerLabel);
        questionDiv.appendChild(answerInput);

        questionContainer.appendChild(questionDiv);

        questionCount++;
    });

</script>




<x-footer/>

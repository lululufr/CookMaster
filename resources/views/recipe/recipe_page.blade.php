<x-header/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#genererFormulaire').click(function() {
            var formulaire = `
            <div class="card bg-base-200 m-2">
                <div class="elementFormulaire">
                    <label for="ingredients" ><b>Ingredients :</b></label>
                    <select name="ingredients[]" class="select w-full max-w-xs mx-4">
                    @foreach(\App\Models\Ingredients::all() as $ingredient)
                        <option value="{{$ingredient->name}}">{{$ingredient->name}}</option>
                    @endforeach
                    </select><br><br>
                    <label for="amount">Quantité :</label>
                    <input type="text" name="amount[]" required><br><br>

                    <label for="units">Unitées :</label>
                    <input type="text" name="units[]"><br><br>

                    <button class="supprimerFormulaire" type="button">X</button>
                </div>
            </div>
            `;

            $('#formulairesGeneres').append(formulaire);
        });

        $(document).on('click', '.supprimerFormulaire', function() {
            $(this).parent('.elementFormulaire').remove();
        });
    });
    $(document).ready(function() {
        $('#addTag').click(function() {
            var formulairetag = `
            <div class="card bg-base-200 class="m-2">
                <div class="elementFormulaire">

                    <label for="tags" ><b>Tags :</b></label>
                    <select name="tags[]" class="select w-full max-w-xs mx-4">
                    @foreach(\App\Models\Tags::whereNot('name','private')->get() as $tag)
                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                    @endforeach
            </select>

            <button class="supprimerFormulaire" type="button">X</button>

        </div>
`;

            $('#tagAdd').append(formulairetag);
        });

    });
</script>


<div class="hero min-h-screen bg-base-200" style="background-image: url('/images/deco/undraw_barbecue_3x93.svg'); opacity: 0.9;">    <div class="hero-content flex-col ">
        <div class="hero-content flex-col lg:flex-row-reverse">

        <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold">{{__("Créer une recette")}}</h1>
            <p class="py-6">{{__("Créer une recette pour que tout le monde puisse se ravir de la merveilleuse jouissance de la vie. Essayez d'etre le plus complet possible.")}}</p>
        </div>
        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="/recipe/create" method="POST" enctype="multipart/form-data" class="place-content-center place-items-center">
                    @csrf
                    <input type="text" name="title" class="border border-gray-400 p-2 w-80 mb-5" placeholder="Nom de la recette" required>
                    <textarea name="content" class="border border-gray-400 p-2 w-80 mb-5" placeholder="Contenu" required></textarea>
                    <input type="file" name="image" class="file-input w-full max-w-xs" />

                    <div id="tagAdd" class="form-control w-full max-w-xs mb-5"></div>
                    <button class="btn p-2" type="button" id="addTag">+ TAG</button>

                    <div id="formulairesGeneres" ></div>
                    <div>
                    <button class="btn" type="button" id="genererFormulaire">+ INGREDIENTS</button>
                    </div>

                    <button class="btn btn-primary" type="submit">Créer</button>
                </form>
            </div>
        </div>


</div>
    </div>
</div>







<x-footer/>

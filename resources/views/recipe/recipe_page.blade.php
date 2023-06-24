<x-header/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#genererFormulaire').click(function() {
            var formulaire = `
            <div class="card bg-base-300">
                <div class="elementFormulaire">
                    <label for="ingredients" >ingredients :</label>
                    <input type="text" name="ingredients[]" required><br><br>

                    <label for="amount">quantité :</label>
                    <input type="text" name="amount[]" required><br><br>

                    <label for="units">unitées :</label>
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
            <div class="card bg-base-300">
                <div class="elementFormulaire">
                    <label for="tags" >tag :</label>
                    <input type="text" name="tags[]"><br><br>
                    <button class="supprimerFormulaire" type="button">X</button>
                </div>
            </div>
            `;

            $('#tagAdd').append(formulairetag);
        });

    });
</script>
    <form action="/recipe/create" method="POST" enctype="multipart/form-data" class="grid justify-items-center m-4">
        @csrf
        <input type="text" name="title" class="border border-gray-400 p-2 w-80" placeholder="Nom de la recette" required>
        <textarea name="content" class="border border-gray-400 p-2 w-80" placeholder="contenu" required></textarea>
        <input type="file" name="image">

        <div id="tagAdd"></div>
        <button class="btn" type="button" id="addTag">Ajouter un tag</button>

        <div id="formulairesGeneres"></div>
        <button class="btn" type="button" id="genererFormulaire">Ajouter un ingrédient</button>

        <input type="submit" placeholder="créer">
    </form>

<x-footer/>

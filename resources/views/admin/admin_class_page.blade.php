<x-header/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#genererFormulaire').click(function() {
            var formulaire = `
                <div class="elementFormulaire">
                    <label for="titre">Titre :</label>
                    <input type="text" name="titre[]" required><br><br>

                    <label for="contenu">Contenu :</label>
                    <textarea name="contenu[]" required></textarea><br><br>

                    <label for="media">Vidéo ou Image :</label>
                    <input type="file" name="media[]"><br><br>

                    <button class="supprimerFormulaire" type="button">X</button>
                </div>
            `;

            $('#formulairesGeneres').append(formulaire);
        });

        $(document).on('click', '.supprimerFormulaire', function() {
            $(this).parent('.elementFormulaire').remove();
        });
    });
</script>
<div class="form-control w-full max-w-xs m-5">
    <form class="grid justify-items-center m-4" action="/admin/create/class" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Partie Classes -->
        <div>
            <input type="text" name="title" placeholder="Titre de la formation" required/>
        </div>

        <div>
            <textarea name="description" placeholder="Description de la formation" required></textarea>
        </div>
        <!-- Partie Classes -->

        <div id="formulairesGeneres"></div>

        <button class="btn" type="button" id="genererFormulaire">Ajouter</button>

        <input class="btn" type="submit" value="Soumettre questionnaire">
    </form>
</div>
<x-footer/>

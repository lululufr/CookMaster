<x-header/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#genererFormulaire').click(function() {
            var formulaire = `
            <div class="card bg-base-200 m-3">
                <div class="elementFormulaire">
                    <b>Chapitre :</b>

                    <label for="titre">Titre :</label>
                    <input class="input w-full max-w-xs m-2" type="text" name="titre[]" required><br><br>

                    <label for="contenu">Contenu :</label>
                    <textarea class="textarea textarea-bordered textarea-lg w-full max-w-xs" name="contenu[]" required></textarea><br><br>

                    <label for="media">Vidéo ou Image :</label>
                    <input class="file-input w-full max-w-xs" type="file" name="media[]"><br><br>

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
</script>



<div class="hero min-h-screen bg-base-200">
    <div class="hero-content text-center">
        <div class="max-w-md">
            <h1 class="text-5xl font-bold">Créer une formation.</h1>
            <p class="py-6">Créez une formation, avec le plus de detail possible. Tous les revenu iront a une association.</p>

            <img src="/images/deco/undraw_educator_re_ju47.svg"/>


            <div class="form-control w-full max-w-xs m-5">
                <form class="grid " action="/admin/create/class" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card bg-base-200">
                        <!-- Partie Classes -->
                        <div>
                            <input class="input w-full max-w-xs" type="text" name="title" placeholder="Titre de la formation" required/>
                        </div>

                        <div>
                            <textarea class="textarea textarea-bordered textarea-lg w-full max-w-xs" name="description" placeholder="Description de la formation" required></textarea>
                        </div>


                        <label for="media">Image de couverture :</label>
                        <input class="file-input w-full max-w-xs" type="file" name="media_classes"><br><br>
                        <!-- Partie Classes -->
                    </div>

                    <div class="card bg-base-200 w-full">
                        <b>Chapitre :</b>
                        <div class="elementFormulaire">
                            <label for="titre">Titre :</label>
                            <input class="input w-full max-w-xs" type="text" name="titre[]" required><br><br>

                            <label for="contenu">Contenu :</label>
                            <textarea class="textarea textarea-bordered textarea-lg w-full max-w-xs" name="contenu[]" required></textarea><br><br>

                            <label for="media">Vidéo ou Image :</label>
                            <input class="file-input w-full max-w-xs" type="file" name="media[]"><br><br>

                        </div>
                    </div>


                    <div id="formulairesGeneres"></div>

                    <button class="btn" type="button" id="genererFormulaire">Ajouter Chapitre</button>

                    <input class="btn btn-primary" type="submit" value="Creer la formation !!">
                </form>
            </div>





        </div>
    </div>
</div>



<x-footer/>

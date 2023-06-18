<x-header/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#genererFormulaire').click(function() {
            var typeFormulaire = $('#typeFormulaire').val();

            var formulaire = '';

            if (typeFormulaire === 'lecon') {
                formulaire = `

                  <label for="question">Question :</label>
                  <input type="text" id="question" name="question"><br><br>

                  <label for="reponse">Réponse :</label>
                  <input type="text" id="reponse" name="reponse"><br><br>

              `;
            } else if (typeFormulaire === 'question') {
                formulaire = `
                  <label for="nom">Nom :</label>
                  <input type="text" id="nom" name="nom"><br><br>

                  <label for="email">Email :</label>
                  <input type="email" id="email" name="email"><br><br>

                  <label for="motDePasse">Mot de passe :</label>
                  <input type="password" id="motDePasse" name="motDePasse"><br><br>
              `;
            }

            $('#formulairesGeneres').append(formulaire);
        });
    });
</script>

<label for="typeFormulaire">Sélectionnez le type de formulaire :</label>
<select id="typeFormulaire">
    <option value="lecon">lecon</option>
    <option value="question">question</option>
</select><br><br>

<button class="btn" type="button" id="genererFormulaire">Ajouter</button>

<br><br>

<form action="/admin/create/class" method="POST">
    @csrf

    <!-- Partie Classes -->
    <div>
        <input type="text" name="title" placeholder="Titre de la formation"/>

    </div>

    <div>
        <textarea type="text" name="description" placeholder="Description de la formation"></textarea>
    </div>
    <!-- Partie Classes -->

    <div id="formulairesGeneres"></div>

    <input class="btn" type="submit" value="Soumettre questionnaire">
</form>
<x-footer/>

@if(session('message'))
    <div class="alert alert-success">
        Préférences modifiés avec succes
    </div>
@endif
<x-header/>

<form action="/users/preferences/change" method="POST">
    @csrf



    <button type="submit" class="btn btn-primary">Enregistrer</button>

</form>






</form>





<x-footer/>

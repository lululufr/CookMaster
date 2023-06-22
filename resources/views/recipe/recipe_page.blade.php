<x-header/>

    <form action="/recipe/create" method="POST" enctype="multipart/form-data" class="grid justify-items-center m-4">
        @csrf
        <input type="text" name="title" class="border border-gray-400 p-2 w-80" placeholder="Nom de la recette">
        <textarea name="content" class="border border-gray-400 p-2 w-80" placeholder="contenu"></textarea>
        <input type="text" name="tags" class="border border-gray-400 p-2 w-80" placeholder="tags">
        <input type="file" name="image" >
        <input type="submit" placeholder="créer">
    </form>

<x-footer/>

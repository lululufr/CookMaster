<x-header/>

    <form action="/postcreation" method="POST" class="grid justify-items-center m-4">
        @csrf
        <label for="message" class="block mb-2">Qu'avez vous a dire ?</label>
        <textarea name="content" rows="4" class="block p-2.5 w-full rounded-lg border" placeholder="Un super resto rue du moulin !!"></textarea>

        <input name="tag" rows="4" class="block p-2.5 w-full text-sm rounded-lg border m-5" placeholder="Un super resto rue du moulin !!"></input>

        <button type="submit" class="btn btn-primary m-5">Poster</button>
    </form>

<x-footer/>

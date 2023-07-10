<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-xl mx-auto py-12">
        <div class="bg-white shadow-lg rounded-lg px-6 py-8">
            <h1 class="text-2xl font-semibold mb-6">COOK with ME</h1>

            <h2>Salut {{$data['name']}}</h2>

            <p>{{$data['message']}}</p>


        </div>
    </div>
</body>

</html>

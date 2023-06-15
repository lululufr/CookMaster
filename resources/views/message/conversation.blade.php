<x-header/>


<h2 class="title">Mes conversations</h2>

<input type="text" id="searchInput" placeholder="Rechercher un utilisateur...">
<div id="searchResults"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 m-4 mx-auto">
    <script>
        $(document).ready(function() {
            var searchInput = $('#searchInput');
            var searchResults = $('#searchResults');

            searchInput.on('input', function() {
                var query = $(this).val();

                $.ajax({
                    url: "{{ route('recherche.utilisateur') }}",
                    type: "GET",
                    data: { q: query },
                    dataType: "json",
                    success: function(response) {
                        searchResults.empty(); // Vide les résultats précédents

                        if (response.length > 0) {
                            var resultsList = $('<ul></ul>');

                            $.each(response, function(index, user) {
                                var listItem = $(



                                    '<label for="idmodal'+user.username+'" class="btn btn-primary">'+user.username+'</label>'+

                                    '<input type="checkbox" id="idmodal'+user.username+'" class="modal-toggle" /> '+
                                        '<div class="modal"> '+
                                            '<div class="modal-box"> '+
                                                '<h3 class="font-bold text-lg">'+user.username+'</h3> '+
                                                '<p class="py-4">'+user.email+'</p> '+
                                                '<p class="py-4">'+user.role+'</p> '+
                                                '<div class="modal-action">'+
                                                '<a href="/message/'+user.id+'">Envoyer Message</a>'+
                                                    '<label for="idmodal'+user.username+'" class="btn">Fermer</label>'+
                                                '</a>'+
                                            '</div>'+
                                        '</div>'


                                ); // Remplacez "name" par le nom du champ que vous souhaitez afficher dans les résultats
                                resultsList.append(listItem);
                            });

                            searchResults.append(resultsList);
                        } else {
                            searchResults.append('<p>Aucun utilisateur trouvé.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</div>








<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 m-4 mx-auto">
@foreach($convs as $conv)
    <div class="card w-96 bg-primary shadow-xl m-3">
        <div class="card-body">
            <h2 class="card-title">{{$conv->username}}</h2>
            <p>{{$conv->email}}</p>
            <p>{{$conv->role}}</p>
            <div class="card-actions justify-end">
                <a href="/message/{{$conv->id}}" class="btn btn-primary">Conversation</a>
            </div>
        </div>
    </div>
@endforeach
</div>







<x-footer/>
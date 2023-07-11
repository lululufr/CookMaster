<x-header/>


<h2>Paiement réalisé avec succes</h2>

{{$charge->amount/ 100}} € ont été débités de votre carte {{$charge->source->brand}} ({{$charge->source->last4}})

Un email vous a été envoyé a l'adresse {{$charge->receipt_email}}


Pour télécharger votre facture veuillez cliquer ici -> <a href="">Télécharger</a>

<x-footer/>

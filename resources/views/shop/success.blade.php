<x-header/>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Paiement réalisé avec succès</h2>
    <div class="bg-white rounded-lg shadow-lg p-6">
        <p class="text-lg mb-4">Un montant de {{ $charge->amount / 100 }} € a été débité de votre carte {{$charge->source->brand}} **** ({{$charge->source->last4}}).</p>
        <p class="text-lg mb-4">Un email vous a été envoyé à l'adresse {{auth()->user()->email}} contenant votre facture.</p>
    </div>
</div>

<x-footer/>

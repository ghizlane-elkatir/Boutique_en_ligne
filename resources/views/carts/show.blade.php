<x-app-layout>
    @foreach ($cartItems as $cartItem)
    <div>
        <h4>{{ $cartItem->produit->name }}</h4>
        <p>Quantité : {{ $cartItem->quantity }}</p>
        <p>Prix unitaire : {{ $cartItem->prix }}</p>
    </div>
@endforeach
</x-app-layout>
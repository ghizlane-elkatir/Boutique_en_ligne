<x-app-layout>

@section('content')
    <div class="container mx-auto">
        <h1>Résultats de la recherche</h1>

        <div>
            @if ($produits->isEmpty())
                <p>Aucun produit trouvé.</p>
            @else
                <ul>
                    @foreach ($produits as $produit)
                        <li>{{ $produit->name }} - {{ $produit->prix }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
</x-app-layout>
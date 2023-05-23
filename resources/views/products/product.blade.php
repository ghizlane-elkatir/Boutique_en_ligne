<x-app-layout>
    <div class="container mx-auto">
        <main>
            <div class="container mx-auto">
                <h1 class="text-2xl font-semibold mb-4">Search Products</h1>
                <form action="{{ route('products.search') }}" method="GET" class="mb-4">
                    <div class="flex items-center">
                        <input type="text" name="name" placeholder="Search by name" class="mr-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <input type="number" name="price" placeholder="Search by price" class="mr-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
                    </div>
                </form>
        
                <!-- Display search results here -->
                <div>
                    <!-- Iterate over search results and display them -->
                </div>
            </div>
        
            <section class="py-8">
                <h1 class="text-2xl font-semibold mb-4">Product</h1>
                <div class="grid grid-cols-3 gap-8">
                    @foreach ($produits as $produit)
                        <div class="bg-white rounded-lg shadow-lg">
                            <a href="{{ route('products.index', $produit->id) }}">
                                <img src="{{ asset('/images/'.$produit->images) }}" alt="Category 1" class="w-full h-48 object-cover rounded-t-lg">
                            </a>
                            <div class="p-4">
                                <a href="{{ route('products.index', $produit->id) }}">
                                    <h3 class="text-lg font-semibold mb-2">{{ $produit->name }}</h3>
                                </a>
                                <p class="text-lg font-semibold mb-2">{{ $produit->prix }}</p>
                                <p class="text-lg font-semibold mb-4">{{ $produit->stock }}</p>
                                <form action="{{ route('cart.addToCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <div class="flex items-center justify-between">
                                        <input type="number" name="quantity" value="1" class="p-2 border border-gray-300 rounded-md mr-2">
                                        <button type="submit" class="flex items-center justify-center bg-blue-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7 2H4a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h1v7a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V8a2 2 0 0 0 2-2h-3V4a2 2 0 0 0-2-2H7zm-3 4h1v7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V6h1a1 1 0 0 0 0-2H4a1 1 0 0 0 0 2z" clip-rule="evenodd" />
                                            </svg>
                                            Add to cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
</x-app-layout>
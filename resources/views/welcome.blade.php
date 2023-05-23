<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* Supprimer la bordure autour des liens */
        a:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container mx-auto">
        @include('layouts.navigation')
        <main>
            <section class="py-8">
                <h1 class="text-2xl font-semibold mb-4">Categories</h1>
                <div class="grid grid-cols-3 gap-8">
                    @foreach ($categories as $categorie)
                        <a href="{{ route('categorie.product.show', $categorie->id) }}" class="focus:outline-none">
                            <div class="bg-white rounded-full shadow-lg flex items-center justify-center w-48 h-48">
                                <img src="{{ asset('/images/'.$categorie->image) }}" alt="Category Image" class="object-cover w-32 h-32 rounded-full">
                            </div>
                            <h3 class="text-lg font-semibold text-center mt-4">{{ $categorie->name }}</h3>
                        </a>
                    @endforeach
                </div>
            </section>
        </main>
        <footer>
            <!-- Your footer here -->
        </footer>
    </div>
</body>
</html>
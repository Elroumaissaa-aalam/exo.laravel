<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/2">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg">
                            @else
                                <div class="w-full h-64 bg-gray-200 dark:bg-gray-600 flex items-center justify-center rounded-lg">
                                    <span class="text-gray-500 dark:text-gray-400">Pas d'image</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="md:w-1/2">
                            <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
                            
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-2xl font-bold">{{ number_format($product->price, 2) }} €</span>
                                <span class="px-3 py-1 rounded {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : ($product->stock > 0 ? 'bg-orange-100 text-orange-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $product->stock > 0 ? 'En stock (' . $product->stock . ')' : 'Rupture de stock' }}
                                </span>
                            </div>
                            
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold mb-2">Description</h3>
                                <p class="text-gray-600 dark:text-gray-300">{{ $product->description }}</p>
                            </div>
                            
                            @auth
                                @role('customer')
                                    @if($product->stock > 0)
                                        <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="flex items-center gap-4 mb-4">
                                                <label for="quantity" class="font-medium">Quantité:</label>
                                                <input 
                                                    type="number" 
                                                    id="quantity" 
                                                    name="quantity" 
                                                    value="1" 
                                                    min="1" 
                                                    max="{{ $product->stock }}" 
                                                    class="w-20 px-3 py-2 border rounded dark:bg-gray-700 dark:border-gray-600"
                                                >
                                            </div>
                                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">
                                                Ajouter au panier
                                            </button>
                                        </form>
                                    @else
                                        <div class="mt-6 p-4 bg-red-100 text-red-700 rounded">
                                            Ce produit est actuellement en rupture de stock.
                                        </div>
                                    @endif
                                @endrole
                            @endauth
                            
                            @guest
                                <div class="mt-6 p-4 bg-blue-100 text-blue-700 rounded">
                                    <a href="{{ route('login') }}" class="font-bold hover:underline">Connectez-vous</a> pour ajouter ce produit à votre panier.
                                </div>
                            @endguest
                            
                            <div class="mt-6">
                                <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">
                                    &larr; Retour aux produits
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
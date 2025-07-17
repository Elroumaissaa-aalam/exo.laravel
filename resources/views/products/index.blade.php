<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produits') }}
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

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                                @if ($product->image)
                                    <img src="" alt="" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                        <span class="text-gray-500 dark:text-gray-400">Pas d'image</span>
                                    </div>
                                @endif
                                
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">test name</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-2 line-clamp-2">test</p>
                                    
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="text-lg font-bold">480 €</span>
                                      
                                    </div>
                                    
                                    @auth
                                        @role('customer')
                                            @if($product->stock > 0)
                                                <form action="{{ route('cart.add') }}" method="POST" class="flex items-center justify-between">
                                                    @csrf
                                                    <input type="hidden" name="product_id" >
                                                    <div class="flex items-center">
                                                        <label for="quantity-{{ $product->id }}" class="sr-only">Quantité</label>
                                                        <input 
                                                            type="number" 
                                                            id="quantity-{{ $product->id }}" 
                                                            name="quantity" 
                                                            value="1" 
                                                            min="1" 
                                                            max="{{ $product->stock }}" 
                                                            class="w-16 px-2 py-1 border rounded dark:bg-gray-700 dark:border-gray-600"
                                                        >
                                                    </div>
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Ajouter
                                                    </button>
                                                </form>
                                            @else
                                                <p class="text-red-500 font-bold text-center py-2">Rupture de stock</p>
                                            @endif
                                        @endrole
                                    @endauth
                                    
                                
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
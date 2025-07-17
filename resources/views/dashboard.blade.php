<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-6">Bienvenue, {{ Auth::user()->name }} !</h2>
                    
                    @if(Auth::user()->role === 'customer')
                    <h3 class="text-lg font-bold mb-4">Espace Client</h3>
                    <div class="space-x-4">
                        <a href="{{ route('products.index') }}" class="bg-green-500 text-white px-4 py-2 rounded">Parcourir les produits</a>
                       
                    </div>
          
                    @endif
                    
                    @if(Auth::user()->role === 'admin')
                    <div class="mb-8">
                        <h3 class="text-lg font-bold mb-4">Espace Administrateur</h3>
                        <p class="text-gray-600 dark:text-gray-400">Vous avez accès à toutes les fonctionnalités d'administration.</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}">go to add</a>
                    @endif
                      
                    @if(Auth::user()->role === 'seller')
                    <div class="mb-8">
                        <h3 class="text-lg font-bold mb-4">Espace Vendeur</h3>
                        <p class="text-gray-600 dark:text-gray-400">Vous avez accès à toutes les fonctionnalités de vendeur.</p>
                    </div>
                    <a href="{{ route('products.index') }}">go to chop</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





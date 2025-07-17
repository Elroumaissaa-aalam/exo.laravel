<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Créer les rôles
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);
        $sellerRole = Role::create(['name' => 'seller']);

        // Créer un utilisateur admin
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        // Créer un utilisateur customer
        $customer = User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
        ]);
        $customer->assignRole($customerRole);

        // Créer un utilisateur seller
        $seller = User::factory()->create([
            'name' => 'Seller',
            'email' => 'seller@example.com',
            'password' => Hash::make('password'),
        ]);
        $seller->assignRole($sellerRole);

        // Créer quelques produits
        $products = [
            [
                'name' => 'T-shirt Premium',
                'description' => 'T-shirt en coton bio de haute qualité, confortable et durable. Disponible en plusieurs tailles et couleurs.',
                'price' => 29.99,
                'stock' => 50,
            ],
            [
                'name' => 'Smartphone XYZ',
                'description' => 'Dernier modèle de smartphone avec écran 6.5", processeur octa-core, 128GB de stockage et appareil photo 48MP.',
                'price' => 699.99,
                'stock' => 15,
            ],
            [
                'name' => 'Casque Audio Sans Fil',
                'description' => 'Casque bluetooth avec réduction de bruit active, autonomie de 30h et son haute définition.',
                'price' => 149.99,
                'stock' => 25,
            ],
            [
                'name' => 'Chaussures de Sport',
                'description' => 'Chaussures légères et confortables, parfaites pour la course à pied ou l\'entraînement quotidien.',
                'price' => 89.99,
                'stock' => 30,
            ],
            [
                'name' => 'Montre Connectée',
                'description' => 'Suivez votre activité physique, recevez des notifications et contrôlez votre musique depuis votre poignet.',
                'price' => 199.99,
                'stock' => 20,
            ],
            [
                'name' => 'Sac à Dos',
                'description' => 'Sac à dos spacieux avec compartiment pour ordinateur portable, résistant à l\'eau et confortable à porter.',
                'price' => 59.99,
                'stock' => 40,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}


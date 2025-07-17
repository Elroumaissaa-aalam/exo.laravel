<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true; // Tous les utilisateurs peuvent voir les produits
    }

    public function view(User $user, Product $product)
    {
        return true; // Tous les utilisateurs peuvent voir un produit
    }

    public function create(User $user)
    {
        return $user->hasRole('seller') || $user->hasRole('admin');
    }

    public function update(User $user, Product $product)
    {
        return $user->id === $product->user_id || $user->hasRole('admin');
    }

    public function delete(User $user, Product $product)
    {
        return $user->hasRole('admin');
    }
}

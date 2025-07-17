<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
   

    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string|in:admin,seller,customer'
        ]);


        $user->update(['role' => $request->role]);





        if (Role::where('name', $request->role)->exists()) {
            $user->syncRoles([$request->role]);
        }

        return back()->with('success', 'Rôle mis à jour avec succès');
    }
}

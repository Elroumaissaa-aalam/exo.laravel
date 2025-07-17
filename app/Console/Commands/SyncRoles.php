<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class SyncRoles extends Command
{
    protected $signature = 'roles:sync';
    protected $description = 'Sync user roles with Spatie Permission';

    public function handle()
    {
       
        $roles = ['admin', 'seller', 'customer'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

     
        User::all()->each(function ($user) {
            if ($user->role) {
                $user->syncRoles([$user->role]);
                $this->info("Synchronized role for user: {$user->email}");
            }
        });

        $this->info('All roles synchronized!');
    }
}
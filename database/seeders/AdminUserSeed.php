<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'App Admin', 
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminPass'),
        ]);

        $role = Role::where('name','=','admin')->first();
        
        $user->assignRole([$role->id]);
    }
}

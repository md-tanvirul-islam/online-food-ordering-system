<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-store',
            'role-show',
            'role-edit',
            'role-update',
            'role-delete',

            'permission-list',
            'permission-create',
            'permission-store',
            'permission-show',
            'permission-edit',
            'permission-update',
            'permission-delete',

            'user-list',
            'user-create',
            'user-store',
            'user-show',
            'user-edit',
            'user-update',
            'user-delete',

            'category-list',
            'category-create',
            'category-store',
            'category-show',
            'category-edit',
            'category-update',
            'category-delete',

            'food-list',
            'food-create',
            'food-store',
            'food-show',
            'food-edit',
            'food-update',
            'food-delete',

            'order-list',
            'order-create',
            'order-store',
            'order-show',
            'order-edit',
            'order-update',
            'order-delete',

            'payment-list',
            'payment-create',
            'payment-store',
            'payment-show',
            'payment-edit',
            'payment-update',
            'payment-delete',

            'profile-list',
            'profile-create',
            'profile-store',
            'profile-show',
            'profile-edit',
            'profile-update',
            'profile-delete',

            'restaurant-list',
            'restaurant-create',
            'restaurant-store',
            'restaurant-show',
            'restaurant-edit',
            'restaurant-update',
            'restaurant-delete',
        ];
      
        foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
        }
    }
}

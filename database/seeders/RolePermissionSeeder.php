<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $managerPermissions = [

            'user-show',
            'user-edit',
            'user-update',

            'category-list',
            'category-show',

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

            'profile-show',
            'profile-edit',
            'profile-update',

            'restaurant-list',
            'restaurant-create',
            'restaurant-store',
            'restaurant-show',
            'restaurant-edit',
            'restaurant-update',
            'restaurant-delete',
        ];
        $manager = Role::where('name','=','manager')->first();
        foreach($managerPermissions as $permission)
        {
            $manager->givePermissionTo($permission);
        }

        $customerPermissions = [

            'user-show',
            'user-edit',
            'user-update',

            'category-list',
            'category-show',

            'food-list',
            'food-show',

            'order-list',
            'order-create',
            'order-store',
            'order-show',
            'order-edit',
            'order-update',


            'payment-list',
            'payment-create',
            'payment-store',
            'payment-show',
            'payment-edit',
            'payment-update',

            'profile-show',
            'profile-edit',
            'profile-update',

            'restaurant-list',
            'restaurant-show',
        ];
        $customer = Role::where('name','=','customer')->first();
        foreach($customerPermissions as $permission)
        {
            $customer->givePermissionTo($permission);
        }
    }
}

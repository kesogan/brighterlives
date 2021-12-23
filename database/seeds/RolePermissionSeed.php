<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        \DB::table('roles')->delete();
        \DB::table('permissions')->delete();

        // create roles and assign created permissions
        $admin = Role::create(['id' => 1, 'name' => 'admin']);
        $customer = Role::create(['id' => 2, 'name' => 'customer']);
        $association_owner = Role::create(['id' => 3, 'name' => 'association_owner']);

        // create permissions
        Permission::create(['id' => 1, 'name' => 'product_access']);
        Permission::create(['id' => 2, 'name' => 'product_create']);
        Permission::create(['id' => 3, 'name' => 'product_edit']);
        Permission::create(['id' => 4, 'name' => 'product_view']);
        Permission::create(['id' => 5, 'name' => 'product_delete']);

        //users Permission
        Permission::create(['id' => 6, 'name' => 'user_access']);
        Permission::create(['id' => 7, 'name' => 'user_create']);
        Permission::create(['id' => 8, 'name' => 'user_view']);
        Permission::create(['id' => 9, 'name' => 'user_edit']);
        Permission::create(['id' => 10, 'name' => 'user_delete']);
        //users Permission

        Permission::create(['id' => 11, 'name' => 'role_access']);
        Permission::create(['id' => 12, 'name' => 'role_create']);
        Permission::create(['id' => 13, 'name' => 'role_edit']);
        Permission::create(['id' => 14, 'name' => 'role_view']);
        Permission::create(['id' => 15, 'name' => 'role_delete']);

        Permission::create(['id' => 16, 'name' => 'permission_access']);
        Permission::create(['id' => 17, 'name' => 'permission_create']);
        Permission::create(['id' => 18, 'name' => 'permission_edit']);
        Permission::create(['id' => 19, 'name' => 'permission_view']);
        Permission::create(['id' => 20, 'name' => 'permission_delete']);
        
        Permission::create(['id' => 21, 'name' => 'category_access']);
        Permission::create(['id' => 22, 'name' => 'category_create']);
        Permission::create(['id' => 23, 'name' => 'category_edit']);
        Permission::create(['id' => 24, 'name' => 'category_view']);
        Permission::create(['id' => 25, 'name' => 'category_delete']);
        
        Permission::create(['id' => 26, 'name' => 'activity_access']);
        Permission::create(['id' => 27, 'name' => 'activity_create']);
        Permission::create(['id' => 28, 'name' => 'activity_edit']);
        Permission::create(['id' => 29, 'name' => 'activity_view']);
        Permission::create(['id' => 30, 'name' => 'activity_delete']);
       
        Permission::create(['id' => 31, 'name' => 'association_access']);
        Permission::create(['id' => 32, 'name' => 'association_create']);
        Permission::create(['id' => 33, 'name' => 'association_edit']);
        Permission::create(['id' => 34, 'name' => 'association_view']);
        Permission::create(['id' => 35, 'name' => 'association_delete']);

        $admin_permissions = Permission::all();

        $customer_permissions = [
            'product_view',
            'product_edit', 
            'product_access', 
        ];
        $assoc_owner_permissions = [
            'product_view',
            'product_edit', 
            'product_access', 
            'association_access',
            'association_view',
        ];

        $admin->syncPermissions($admin_permissions);
        $customer->syncPermissions($customer_permissions);
        $association_owner->syncPermissions($assoc_owner_permissions);
  
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DenominationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);


        $role = Role::create(['name' => 'SUPER']);
        $role = Role::create(['name' => 'ADMIN']);
        $role = Role::create(['name' => 'EMPLOYEE']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user = User::find(1);
        $user->assignRole('SUPER');
        $user = User::find(2);
        $user->assignRole('ADMIN');
        $user = User::find(3);
        $user->assignRole('EMPLOYEE');
            $permissions = [
                'Home_Index',
                'Pos_Index',
                'Profile_Index',
                'Category_Index',
                'Category_Create',
                'Category_Search',
                'Category_Update',
                'Category_Destroy',
                'Product_Index',
                'Product_Create',
                'Product_Search',
                'Product_Update',
                'Product_Destroy',
                'Route_Index',
                'Orders_Index',
                'Deliver_Index',
                'Client_Index',
                'Client_Create',
                'Client_Search',
                'Client_Update',
                'Client_Destroy',
                'Role_Index',
                'Role_Create',
                'Role_Search',
                'Role_Update',
                'Role_Destroy',
                'Permission_Index',
                'Permission_Create',
                'Permission_Search',
                'Permission_Update',
                'Permission_Destroy',
                'Asignar_Index',
                'User_Index',
                'User_Create',
                'User_Search',
                'User_Update',
                'User_Destroy',
                'User_Inactive',
                'User_Active',
                'Denomination_Index',
                'Denomination_Create',
                'Denomination_Search',
                'Denomination_Update',
                'Denomination_Destroy',
                'Cashout_Index',
                'Reports_Index',
            ];

         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
         }

         //permisos para el rol super
         $role = Role::find(1);
         $role->givePermissionTo('Home_Index');
         $role->givePermissionTo('Pos_Index');
         $role->givePermissionTo('Profile_Index');
         $role->givePermissionTo('Category_Index');
         $role->givePermissionTo('Category_Create');
         $role->givePermissionTo('Category_Search');
         $role->givePermissionTo('Category_Update');
         $role->givePermissionTo('Category_Destroy');
         $role->givePermissionTo('Route_Index');
         $role->givePermissionTo('Orders_Index');
         $role->givePermissionTo('Deliver_Index');
         $role->givePermissionTo('Client_Index');
         $role->givePermissionTo('Client_Create');
         $role->givePermissionTo('Client_Search');
         $role->givePermissionTo('Client_Update');
         $role->givePermissionTo('Client_Destroy');
         $role->givePermissionTo('Product_Index');
         $role->givePermissionTo('Product_Create');
         $role->givePermissionTo('Product_Search');
         $role->givePermissionTo('Product_Update');
         $role->givePermissionTo('Product_Destroy');
         $role->givePermissionTo('Role_Index');
         $role->givePermissionTo('Role_Create');
         $role->givePermissionTo('Role_Search');
         $role->givePermissionTo('Role_Update');
         $role->givePermissionTo('Role_Destroy');
         $role->givePermissionTo('Permission_Index');
         $role->givePermissionTo('Permission_Create');
         $role->givePermissionTo('Permission_Search');
         $role->givePermissionTo('Permission_Update');
         $role->givePermissionTo('Permission_Destroy');
         $role->givePermissionTo('Asignar_Index');
         $role->givePermissionTo('User_Index');
         $role->givePermissionTo('User_Create');
         $role->givePermissionTo('User_Search');
         $role->givePermissionTo('User_Update');
         $role->givePermissionTo('User_Destroy');
         $role->givePermissionTo('User_Active');
         $role->givePermissionTo('User_Inactive');
         $role->givePermissionTo('Denomination_Index');
         $role->givePermissionTo('Denomination_Create');
         $role->givePermissionTo('Denomination_Search');
         $role->givePermissionTo('Denomination_Update');
         $role->givePermissionTo('Denomination_Destroy');
         $role->givePermissionTo('Cashout_Index');
         $role->givePermissionTo('Reports_Index');

         $role1 = Role::find(2);
         $role1->givePermissionTo('Home_Index');
         $role1->givePermissionTo('Pos_Index');
         $role1->givePermissionTo('Profile_Index');
         $role1->givePermissionTo('Category_Index');
         $role1->givePermissionTo('Category_Create');
         $role1->givePermissionTo('Category_Search');
         $role1->givePermissionTo('Category_Update');
         $role1->givePermissionTo('Category_Destroy');
         $role1->givePermissionTo('Product_Index');
         $role1->givePermissionTo('Product_Create');
         $role1->givePermissionTo('Product_Search');
         $role1->givePermissionTo('Product_Update');
         $role1->givePermissionTo('Product_Destroy');
         $role1->givePermissionTo('Route_Index');
         $role1->givePermissionTo('Orders_Index');
         $role1->givePermissionTo('Deliver_Index');
         $role1->givePermissionTo('Client_Index');
         $role1->givePermissionTo('Client_Create');
         $role1->givePermissionTo('Client_Search');
         $role1->givePermissionTo('Client_Update');
         $role1->givePermissionTo('Client_Destroy');
         $role1->givePermissionTo('Role_Index');
         $role1->givePermissionTo('Role_Search');
         $role1->givePermissionTo('Permission_Index');
         $role1->givePermissionTo('Permission_Search');
         $role1->givePermissionTo('Asignar_Index');
         $role1->givePermissionTo('User_Index');
         $role1->givePermissionTo('User_Create');
         $role1->givePermissionTo('User_Search');
         $role1->givePermissionTo('User_Update');
         $role1->givePermissionTo('User_Destroy');
         $role1->givePermissionTo('User_Active');
         $role1->givePermissionTo('User_Inactive');
         $role1->givePermissionTo('Denomination_Index');
         $role1->givePermissionTo('Denomination_Create');
         $role1->givePermissionTo('Denomination_Search');
         $role1->givePermissionTo('Denomination_Update');
         $role1->givePermissionTo('Denomination_Destroy');
         $role1->givePermissionTo('Cashout_Index');
         $role1->givePermissionTo('Reports_Index');

         $role2 = Role::find(3);
         $role2->givePermissionTo('Pos_Index');
         $role2->givePermissionTo('Category_Index');
         $role2->givePermissionTo('Category_Search');
         $role2->givePermissionTo('Product_Index');
         $role2->givePermissionTo('Product_Search');
         $role2->givePermissionTo('Denomination_Index');
         $role2->givePermissionTo('Denomination_Search');


        }
}

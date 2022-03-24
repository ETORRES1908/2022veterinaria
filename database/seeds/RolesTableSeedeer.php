<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'webmaster']);
        $role1->givePermissionTo(['cms', 'chngs']);

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo(['cms']);

        $role3 = Role::create(['name' => 'own']);
        $role3->givePermissionTo(['addanimal', 'addevent', 'profile']);

        $role4 = Role::create(['name' => 'cls']);
        $role4->givePermissionTo('addevent', 'profile');

        $role5 = Role::create(['name' => 'jdg']);
        $role5->givePermissionTo('sentence', 'profile');

        $role6 = Role::create(['name' => 'cdk']);
        $role6->givePermissionTo(['adddeal', 'chngw', 'profile']);

        $role7 = Role::create(['name' => 'asst']);
        $role7->givePermissionTo(['profile']);

        $role8 = Role::create(['name' => 'ppr']);
        $role8->givePermissionTo(['profile']);

        $role9 = Role::create(['name' => 'amt']);
        $role9->givePermissionTo(['profile']);
    }
}

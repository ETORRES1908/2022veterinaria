<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Mantenimientos
        Permission::create(['name' => 'cms']);
        //Cambiar de Estado
        Permission::create(['name' => 'chngs']);
        //Mantenimiento de Usuarios
        Permission::create(['name' => 'muser']);

        //Cambiar peso
        Permission::create(['name' => 'chngw']);
        //ADD PACTADO
        Permission::create(['name' => 'adddeal']);
        //SENTENCE
        Permission::create(['name' => 'sentence']);
        //ADD EVENT
        Permission::create(['name' => 'addevent']);
        //ADD ANIMAL
        Permission::create(['name' => 'addanimal']);
        //PROFILE
        Permission::create(['name' => 'profile']);
    }
}

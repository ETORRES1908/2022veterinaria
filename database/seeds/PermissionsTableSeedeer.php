base/seeds/PermissionsTableSeeder.phpPHP
<?php

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
        //Agregar pactado
        Permission::create(['name' => 'adddeal']);
        //Sentenciar
        Permission::create(['name' => 'sentence']);
        //Agregar evento
        Permission::create(['name' => 'addevent']);
        //Aggregar evento
        Permission::create(['name' => 'addanimal']);
    }
}

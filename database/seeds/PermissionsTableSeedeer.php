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
        Permission::create(['name' => 'Mantenimientos']);
        //Mantenimiento de Usuarios
        Permission::create(['name' => 'MUser']);
        //Mantenimiento de mascotas
        Permission::create(['name' => 'MPets']);
        //Mantenimiento de Eventos
        Permission::create(['name' => 'MEventos']);
        //Mantenimiento de Eventos
        Permission::create(['name' => 'OtroP']);
        //Mantenimiento de MyPets
        Permission::create(['name' => 'MyPets']);
        //Mantenimiento de EVENTS
        Permission::create(['name' => 'events.create']);
    }
}

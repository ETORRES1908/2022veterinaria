<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Mascota;
use App\Coliseos;
use App\Eventos;
use App\LParticipantes;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'status' => 1, 'usert' => 'owner'
        ])->assignRole('owner');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'status' => 1, 'usert' => 'cls'
        ])->assignRole('cls');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'status' => 1, 'usert' => 'jdg'
        ])->assignRole('jdg');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'status' => 1, 'usert' => 'cdk'
        ])->assignRole('cdk');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'status' => 1, 'usert' => 'asst'
        ])->assignRole('asst');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'status' => 1, 'usert' => 'ppr'
        ])->assignRole('ppr');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'status' => 1, 'usert' => 'amt'
        ])->assignRole('amt');

        //ADMIN
        factory(User::class)->create([
            'name' => 'webmaster',
            'nombre' => 'webmaster',
            'usert' => 'webmaster',
            'apellido' => 'webmaster',
            'status' => 1,
            'password' => bcrypt('123'),
        ])->assignRole('webmaster');

        //ADMIN
        factory(User::class)->create([
            'name' => 'admin',
            'nombre' => 'admin',
            'usert' => 'admin',
            'apellido' => 'admin',
            'status' => 1,
            'password' => bcrypt('123'),
        ])->assignRole('admin');

        //USER
        $user = factory(User::class)->create([
            'name' => 'user',
            'nombre' => 'user',
            'usert' => 'owner',
            'apellido' => 'user',
            'status' => 1,
            'password' => bcrypt('123'),
        ])->assignRole('owner');

        //COLISEOS
        factory(Coliseos::class, 5)->create();
    }
}

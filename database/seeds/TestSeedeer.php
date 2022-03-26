<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Mascota;
use App\Coliseos;
use App\Eventos;
use App\LParticipantes;

class TestSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //USERS AND ROLES AND MASCOTAS
       /*  factory(User::class)->create([
            'name' => 'own', 'usert' => 'own',
            'status' => 1
        ])->assignRole('own'); */

        //USERS AND ROLES AND MASCOTAS
       /*  $cls = factory(User::class)->create([
            'name' => 'cls', 'usert' => 'cls',
            'status' => 1
        ])->assignRole('cls'); */
/*
        factory(Coliseos::class)->create([
            'user_id' => $cls->id
        ]);
 */
        //USERS AND ROLES AND MASCOTAS
      /*   factory(User::class)->create([
            'name' => 'jdg',
            'usert' => 'jdg',
            'status' => 1
        ])->assignRole('jdg'); */

        //USERS AND ROLES AND MASCOTAS
      /*   factory(User::class)->create([
            'name' => 'cdk', 'usert' => 'cdk',
            'status' => 1
        ])->assignRole('cdk'); */

        //USERS AND ROLES AND MASCOTAS
       /*  factory(User::class)->create([
            'name' => 'asst', 'usert' => 'asst',
            'status' => 1
        ])->assignRole('asst'); */

        //USERS AND ROLES AND MASCOTAS
       /*  factory(User::class)->create([
            'name' => 'ppr',
            'status' => 1, 'usert' => 'ppr'
        ])->assignRole('ppr');
 */
        //USERS AND ROLES AND MASCOTAS
     /*    factory(User::class)->create([
            'name' => 'amt',
            'status' => 1, 'usert' => 'amt'
        ])->assignRole('amt');
 */
        //ADMIN
        factory(User::class)->create([
            'name' => 'webmaster',
            'usert' => 'webmaster',
            'nombre' => 'webmaster',
            'apellido' => 'webmaster',
            'status' => 1,
            'password' => bcrypt('QWERTYQWERTY'),
        ])->assignRole('webmaster');

        //ADMIN
        factory(User::class)->create([
            'name' => 'admin',
            'usert' => 'admin',
            'nombre' => 'admin',
            'apellido' => 'admin',
            'status' => 1,
            'password' => bcrypt('QWERTYQWERTY'),
        ])->assignRole('admin');

        //USER
       /*  $user = factory(User::class)->create([
            'name' => 'user',
            'usert' => 'own',
            'nombre' => 'user',
            'apellido' => 'user',
            'status' => 1,
            'password' => bcrypt('123'),
        ])->assignRole('own'); */
    }
}

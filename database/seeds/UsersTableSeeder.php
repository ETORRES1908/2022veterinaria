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
        factory(User::class, 5)->create()
            ->each(function ($u) {
                if ($u->id == 1) {
                    $u->assignRole('administrator');
                } else {
                    $u->assignRole('user');
                }
            });
        //ADMIN
        factory(User::class)->create([
            'name' => 'admin',
            'nombre' => 'admin',
            'apellido' => '',
            'status' => 1,
            'password' => bcrypt('123'),
        ])->assignRole('administrator');
        //USER
        $user = factory(User::class)->create([
            'name' => 'user',
            'nombre' => 'user',
            'apellido' => '',
            'status' => 1,
            'password' => bcrypt('123'),
        ])->assignRole('user');
        //COLISEOS
        factory(Coliseos::class, 5)->create();
        //EVENTO
        /* factory(Eventos::class, 1)->create(['organizador_id' => 1, 'jueza_id' => 2, 'juezb_id' => 3]);
        factory(LParticipantes::class, 1)->create(['evento_id' => 1, 'mascota_id' => 1]); */
    }
}

<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Mascota;
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
                factory(Mascota::class, 1)->create(['user_id' => $u->id]);
            });
        //ADMIN
        factory(User::class)->create([
            'name' => 'Admin',
            'password' => bcrypt('password'),
        ])->assignRole('administrator');
        //USER
        $user = factory(User::class)->create([
            'name' => 'User',
            'password' => bcrypt('password')
        ])->assignRole('user');
        factory(Mascota::class, 5)->create(['user_id' => $user->id]);
        //EVENTO
        /* factory(Eventos::class, 1)->create(['organizador_id' => 1, 'jueza_id' => 2, 'juezb_id' => 3]);
        factory(LParticipantes::class, 1)->create(['evento_id' => 1, 'mascota_id' => 1]); */
    }
}

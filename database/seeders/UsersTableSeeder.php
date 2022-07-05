<?php
namespace Database\Seeders;
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
            'usert' => 'own', 'status' => 1
        ])->assignRole('own');

        //USERS AND ROLES AND MASCOTAS
        $cls = factory(User::class)->create([
            'status' => 1, 'usert' => 'cls'
        ])->assignRole('cls');
        factory(Coliseos::class)->create([
            'user_id' => $cls->id
        ]);

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'usert' => 'jdg', 'status' => 1
        ])->assignRole('jdg');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'usert' => 'cdk', 'status' => 1
        ])->assignRole('cdk');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'usert' => 'asst', 'status' => 1
        ])->assignRole('asst');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'usert' => 'ppr', 'status' => 1
        ])->assignRole('ppr');

        //USERS AND ROLES AND MASCOTAS
        factory(User::class)->create([
            'usert' => 'amt', 'status' => 1
        ])->assignRole('amt');
    }
}

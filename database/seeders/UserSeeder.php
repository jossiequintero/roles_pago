<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jossie S.',
            'apellidos' => 'Quintero Giron',
            'cedula' => '0850111111',
            'fecha_nacimiento' => '1998-09-08',
            'rol' => 'RH',
            'email' => 'joshy@mail.com',
            'password' => bcrypt('joshy'),
        ]);

        User::create([
            'name' => 'Juan S.',
            'apellidos' => 'Quintero Giron',
            'cedula' => '0850222222',
            'fecha_nacimiento' => '1999-01-01',
            'rol' => 'Empleado',
            'email' => 'juan@mail.com',
            'password' => bcrypt('juan'),
        ]);
    }
}

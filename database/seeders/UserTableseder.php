<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableseder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'nicolas Imprevisivel',
            'email' => 'nicolaupz14@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password

            'cedula'=>'0048484833LA041',
            'address'=>'Av Brazil',
            'phone'=>'949714096',
            'role'=>'admin',
        ]);

        User::create([
            'name' => 'Medico1',
            'email' => 'medico11@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role'=>'doctor',
        ]);
        User::create([
            'name' => 'paciente1',
            'email' => 'paciente@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role'=>'paciente',
        ]);
        User::factory()
        ->count(50)
        ->create();
    }
}

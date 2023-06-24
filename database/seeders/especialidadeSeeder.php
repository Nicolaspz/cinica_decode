<?php

namespace Database\Seeders;

use App\Models\especialidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class especialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $pecialidadae=[
        'Neurologia',
        'Cirúgica',
        'Cardiologia',
        'Urologia',
        'Medicina forense',
        'Dermatologia'
       ];
       foreach ($pecialidadae as $esp){
            especialidade::create(
                [
                    'nome'=>$esp,
                    'descricao'=>$esp
                ]
                );
       }
    }
}

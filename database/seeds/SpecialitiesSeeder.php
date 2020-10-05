<?php

use Illuminate\Database\Seeder;
use App\Speciality;

class SpecialitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::create([
            'name' => 'Medicina gral.',
            'description' => 'NN',
            'icon' => 'fas fa-user-md',
            'color' => 'primary',
            'price' => '70'
        ]);

        Speciality::create([
            'name' => 'Pediatra',
            'description' => 'NN',
            'icon' => 'fas fa-baby',
            'color' => 'success',
            'price' => '70'
        ]);

        Speciality::create([
            'name' => 'Enfermera(o)',
            'description' => 'NN',
            'icon' => 'fas fa-hand-holding-medical',
            'color' => 'danger',
            'price' => '70'
        ]);

        Speciality::create([
            'name' => 'Odontólogo',
            'description' => 'NN',
            'icon' => 'fas fa-tooth',
            'color' => 'info',
            'price' => '70'
        ]);

        Speciality::create([
            'name' => 'Cardiólogo',
            'description' => 'NN',
            'icon' => 'fas fa-heartbeat',
            'color' => 'danger',
            'price' => '70'
        ]);
    }
}

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
            'color' => 'primary'
        ]);

        Speciality::create([
            'name' => 'Pediatra',
            'description' => 'NN',
            'icon' => 'fas fa-baby',
            'color' => 'success'
        ]);

        Speciality::create([
            'name' => 'Enfermera(o)',
            'description' => 'NN',
            'icon' => 'fas fa-hand-holding-medical',
            'color' => 'danger'
        ]);

        Speciality::create([
            'name' => 'Odontólogo',
            'description' => 'NN',
            'icon' => 'fas fa-tooth',
            'color' => 'info'
        ]);

        Speciality::create([
            'name' => 'Cardiólogo',
            'description' => 'NN',
            'icon' => 'fas fa-heartbeat',
            'color' => 'danger'
        ]);
    }
}

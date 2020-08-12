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
            'icon' => ''
        ]);

        Speciality::create([
            'name' => 'Pediatría.',
            'description' => 'NN',
            'icon' => ''
        ]);

        Speciality::create([
            'name' => 'Enfermería',
            'description' => 'NN',
            'icon' => ''
        ]);
    }
}

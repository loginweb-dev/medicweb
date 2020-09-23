<?php

use Illuminate\Database\Seeder;

class AnalysisTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('analysis_types')->delete();
        
        \DB::table('analysis_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'HEMATOLOGIA',
                'description' => 'HEMATOLOGIA',
                'order' => 1,
                'created_at' => '2020-09-23 16:15:33',
                'updated_at' => '2020-09-23 16:21:35',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'INMUNOLOGIA',
                'description' => 'INMUNOLOGIA',
                'order' => 2,
                'created_at' => '2020-09-23 16:16:34',
                'updated_at' => '2020-09-23 16:21:46',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'MICROBIOLOGIA',
                'description' => 'MICROBIOLOGIA',
                'order' => 3,
                'created_at' => '2020-09-23 16:17:14',
                'updated_at' => '2020-09-23 16:21:56',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'QUIMICA CLINICA',
                'description' => 'QUIMICA CLINICA',
                'order' => 4,
                'created_at' => '2020-09-23 16:17:43',
                'updated_at' => '2020-09-23 16:22:08',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
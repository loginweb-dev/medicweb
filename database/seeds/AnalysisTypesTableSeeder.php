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
                'name' => 'SERO INMUNOLOGIA ELECTROQUIMIOLUMINISCENCIA',
                'description' => 'SERO INMUNOLOGIA ELECTROQUIMIOLUMINISCENCIA',
                'order' => 2,
                'created_at' => '2020-09-23 16:16:34',
                'updated_at' => '2020-09-23 17:28:09',
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
            4 => 
            array (
                'id' => 5,
                'name' => 'INMUNOGLOBULINAS',
                'description' => 'Inmunoglobulinas',
                'order' => 5,
                'created_at' => '2020-09-23 18:23:36',
                'updated_at' => '2020-09-23 18:23:43',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'ALERGIAS',
                'description' => 'Alergias',
                'order' => 6,
                'created_at' => '2020-09-23 18:26:03',
                'updated_at' => '2020-09-23 18:26:03',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'ELECTROLITOS',
                'description' => 'ELECTROLITOS',
                'order' => 7,
                'created_at' => '2020-09-23 18:30:22',
                'updated_at' => '2020-09-23 18:30:22',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'QUIMICA CINETICA',
                'description' => 'QUIMICA CINETICA',
                'order' => 8,
                'created_at' => '2020-09-23 18:32:52',
                'updated_at' => '2020-09-23 18:32:52',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
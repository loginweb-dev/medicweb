<?php

use Illuminate\Database\Seeder;

class AnalysisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('analysis')->delete();
        
        \DB::table('analysis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'analysis_type_id' => 1,
                'name' => 'BIOMETRIA HEMATICA COMPLETA',
                'description' => 'Biometría hemática completa',
                'order' => 1,
                'created_at' => '2020-09-23 16:20:47',
                'updated_at' => '2020-09-23 16:54:27',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'analysis_type_id' => 1,
                'name' => 'PLAQUETAS',
                'description' => 'Plaquetas',
                'order' => 2,
                'created_at' => '2020-09-23 16:29:58',
                'updated_at' => '2020-09-23 16:54:03',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'analysis_type_id' => 1,
                'name' => 'ERITROSEDIMENTACION',
                'description' => 'Eritro-Sedimentación',
                'order' => 3,
                'created_at' => '2020-09-23 16:55:17',
                'updated_at' => '2020-09-23 16:55:17',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'analysis_type_id' => 1,
                'name' => 'INV DE HEMATOZOARIO',
                'description' => 'Inv. de Hematozoario',
                'order' => 4,
                'created_at' => '2020-09-23 16:56:24',
                'updated_at' => '2020-09-23 16:56:24',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'analysis_type_id' => 1,
                'name' => 'GRUPO SANGUINEO',
                'description' => 'Grupo Sanguineo',
                'order' => 5,
                'created_at' => '2020-09-23 16:57:01',
                'updated_at' => '2020-09-23 16:57:01',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'analysis_type_id' => 1,
                'name' => 'RETICULOSITOS',
                'description' => 'Reticulositos',
                'order' => 6,
                'created_at' => '2020-09-23 16:57:42',
                'updated_at' => '2020-09-23 16:57:42',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'analysis_type_id' => 1,
                'name' => 'ANORMALIDADES CITOLOGICAS',
                'description' => 'Anormalidades Citológicas',
                'order' => 7,
                'created_at' => '2020-09-23 16:58:34',
                'updated_at' => '2020-09-23 16:58:34',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'analysis_type_id' => 1,
                'name' => 'TEST DE COOMBS',
                'description' => 'Test de Coombs.',
                'order' => 8,
                'created_at' => '2020-09-23 16:59:24',
                'updated_at' => '2020-09-23 16:59:24',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'analysis_type_id' => 1,
                'name' => 'TIEMPO DE COAGULACION',
                'description' => 'Tiempo de Coagulación',
                'order' => 9,
                'created_at' => '2020-09-23 17:00:14',
                'updated_at' => '2020-09-23 17:00:14',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'analysis_type_id' => 1,
                'name' => 'TIEMPO DE SANGRIA',
                'description' => 'Tiempo de Sangría',
                'order' => 10,
                'created_at' => '2020-09-23 17:00:50',
                'updated_at' => '2020-09-23 17:00:50',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'analysis_type_id' => 1,
                'name' => 'TIEMPO DE PROTROMBINA',
                'description' => 'Tiempo de Protrombina.',
                'order' => 11,
                'created_at' => '2020-09-23 17:01:43',
                'updated_at' => '2020-09-23 17:01:43',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'analysis_type_id' => 1,
                'name' => 'TIEMPO DE TROMBOPLASTINA',
                'description' => 'Tiempo de TromboPlastina',
                'order' => 12,
                'created_at' => '2020-09-23 17:02:46',
                'updated_at' => '2020-09-23 17:02:46',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'analysis_type_id' => 1,
                'name' => 'FIBRINOGENO',
                'description' => 'Fibrinógeno',
                'order' => 13,
                'created_at' => '2020-09-23 17:03:31',
                'updated_at' => '2020-09-23 17:03:31',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'analysis_type_id' => 1,
                'name' => 'ERITROPOYETINA +-',
                'description' => 'EritroPoyetina +-',
                'order' => 14,
                'created_at' => '2020-09-23 17:04:29',
                'updated_at' => '2020-09-23 17:04:29',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'analysis_type_id' => 1,
                'name' => 'FERRITINA',
                'description' => 'Ferritina',
                'order' => 15,
                'created_at' => '2020-09-23 17:05:11',
                'updated_at' => '2020-09-23 17:05:11',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'analysis_type_id' => 1,
                'name' => 'TRANSFERRINA',
                'description' => 'TransFerrina',
                'order' => 16,
                'created_at' => '2020-09-23 17:05:47',
                'updated_at' => '2020-09-23 17:05:47',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'analysis_type_id' => 1,
                'name' => 'ACIDO FOLICO',
                'description' => 'Acido Fólico',
                'order' => 17,
                'created_at' => '2020-09-23 17:06:16',
                'updated_at' => '2020-09-23 17:06:16',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'analysis_type_id' => 1,
                'name' => 'GLUCOSA -6 PDH >>+-',
                'description' => 'Glucosa -6 PDH >>+-',
                'order' => 18,
                'created_at' => '2020-09-23 17:07:31',
                'updated_at' => '2020-09-23 17:07:52',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
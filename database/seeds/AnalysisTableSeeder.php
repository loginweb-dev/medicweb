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
            18 => 
            array (
                'id' => 19,
                'analysis_type_id' => 2,
                'name' => 'BRUCELLA ABORTUS',
                'description' => 'Brucella Abortus',
                'order' => 19,
                'created_at' => '2020-09-23 17:29:12',
                'updated_at' => '2020-09-23 17:29:12',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'analysis_type_id' => 2,
                'name' => 'TOXOPLASMA IgG',
                'description' => 'Toxoplasma IgG',
                'order' => 20,
                'created_at' => '2020-09-23 17:30:21',
                'updated_at' => '2020-09-23 17:30:21',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'analysis_type_id' => 2,
                'name' => 'TOXOPLASMA IgM',
                'description' => 'Toxoplasma IgM',
                'order' => 21,
                'created_at' => '2020-09-23 17:30:57',
                'updated_at' => '2020-09-23 17:30:57',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'analysis_type_id' => 2,
                'name' => 'RUBEOLA IgG',
                'description' => 'Rubeola IgG',
                'order' => 22,
                'created_at' => '2020-09-23 17:31:50',
                'updated_at' => '2020-09-23 17:31:50',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'analysis_type_id' => 2,
                'name' => 'RUBEOLA IgM',
                'description' => 'Rubeola IgM',
                'order' => 23,
                'created_at' => '2020-09-23 17:40:58',
                'updated_at' => '2020-09-23 17:40:58',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'analysis_type_id' => 2,
                'name' => 'CITOMEGALOVIRUS IgG',
                'description' => 'Citomegalovirus IgG',
                'order' => 24,
                'created_at' => '2020-09-23 17:41:58',
                'updated_at' => '2020-09-23 17:42:07',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'analysis_type_id' => 2,
                'name' => 'HERPES I IgG',
                'description' => 'Herpes I IgG',
                'order' => 25,
                'created_at' => '2020-09-23 17:44:34',
                'updated_at' => '2020-09-23 17:44:34',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'analysis_type_id' => 2,
                'name' => 'HERPES I IgGM',
                'description' => 'Herpes I IgM',
                'order' => 26,
                'created_at' => '2020-09-23 17:54:07',
                'updated_at' => '2020-09-23 17:54:07',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'analysis_type_id' => 2,
                'name' => 'HERPES II IgG',
                'description' => 'Herpes II IgG',
                'order' => 27,
                'created_at' => '2020-09-23 17:57:24',
                'updated_at' => '2020-09-23 17:57:24',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'analysis_type_id' => 2,
                'name' => 'HERPES II IgM',
                'description' => 'Herpes II IgM',
                'order' => 28,
                'created_at' => '2020-09-23 17:57:51',
                'updated_at' => '2020-09-23 17:57:51',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'analysis_type_id' => 2,
                'name' => 'HEPATITIS A',
                'description' => 'Hepatitis A',
                'order' => 29,
                'created_at' => '2020-09-23 17:58:30',
                'updated_at' => '2020-09-23 17:58:30',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'analysis_type_id' => 2,
                'name' => 'HEPATITIS B',
                'description' => 'Hepatitis B',
                'order' => 30,
                'created_at' => '2020-09-23 17:59:14',
                'updated_at' => '2020-09-23 17:59:14',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'analysis_type_id' => 2,
                'name' => 'HEPATITIS C',
                'description' => 'Hepatitis C',
                'order' => 30,
                'created_at' => '2020-09-23 17:59:49',
                'updated_at' => '2020-09-23 17:59:49',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'analysis_type_id' => 2,
                'name' => 'DENGUE IgG',
                'description' => 'Dengue IgG',
                'order' => 31,
                'created_at' => '2020-09-23 18:02:13',
                'updated_at' => '2020-09-23 18:02:13',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'analysis_type_id' => 2,
                'name' => 'DENGUE IgM',
                'description' => 'Dengue IgM',
                'order' => 32,
                'created_at' => '2020-09-23 18:02:34',
                'updated_at' => '2020-09-23 18:02:34',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'analysis_type_id' => 2,
                'name' => 'DENGUE NS1',
                'description' => 'Dengue NS1',
                'order' => 33,
                'created_at' => '2020-09-23 18:03:25',
                'updated_at' => '2020-09-23 18:03:47',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'analysis_type_id' => 2,
                'name' => 'CLAMIDIA EN SANGRE',
                'description' => 'Clamidia en Sangre',
                'order' => 34,
                'created_at' => '2020-09-23 18:04:20',
                'updated_at' => '2020-09-23 18:04:29',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'analysis_type_id' => 2,
                'name' => 'MONONUCLEOSIS INFECCIOSA',
                'description' => 'Mononucleosis Infecciosa',
                'order' => 35,
                'created_at' => '2020-09-23 18:21:20',
                'updated_at' => '2020-09-23 18:21:20',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'analysis_type_id' => 2,
                'name' => 'TUBERCULOSIS SERICA',
                'description' => 'Tuberculosis Sérica',
                'order' => 36,
                'created_at' => '2020-09-23 18:21:54',
                'updated_at' => '2020-09-23 18:21:54',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'analysis_type_id' => 2,
                'name' => 'CHAGAS',
                'description' => 'Chagas',
                'order' => 37,
                'created_at' => '2020-09-23 18:22:24',
                'updated_at' => '2020-09-23 18:22:32',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'analysis_type_id' => 5,
                'name' => 'IgA',
                'description' => 'IgA',
                'order' => 38,
                'created_at' => '2020-09-23 18:24:33',
                'updated_at' => '2020-09-23 18:24:39',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'analysis_type_id' => 5,
                'name' => 'IgG',
                'description' => 'IgG',
                'order' => 39,
                'created_at' => '2020-09-23 18:25:07',
                'updated_at' => '2020-09-23 18:25:07',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'analysis_type_id' => 5,
                'name' => 'IgM',
                'description' => 'IgM',
                'order' => 40,
                'created_at' => '2020-09-23 18:25:25',
                'updated_at' => '2020-09-23 18:25:25',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'analysis_type_id' => 5,
                'name' => 'IgE',
                'description' => 'IgE',
                'order' => 41,
                'created_at' => '2020-09-23 18:25:42',
                'updated_at' => '2020-09-23 18:25:42',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'analysis_type_id' => 6,
                'name' => 'IgE TOTAL',
                'description' => 'IgE Total',
                'order' => 42,
                'created_at' => '2020-09-23 18:26:38',
                'updated_at' => '2020-09-23 18:26:38',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'analysis_type_id' => 6,
                'name' => 'PANEL ALERGENOS ALIMENTICIOS  >>+-',
                'description' => 'PANEL ALERGENOS ALIMENTICIOS  >>+-',
                'order' => 43,
                'created_at' => '2020-09-23 18:27:51',
                'updated_at' => '2020-09-23 18:27:51',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'analysis_type_id' => 6,
                'name' => 'PANEL ALERGENOS RESPIRATORIOS  >>+-',
                'description' => 'PANEL ALERGENOS RESPIRATORIOS  >>+-',
                'order' => 44,
                'created_at' => '2020-09-23 18:28:31',
                'updated_at' => '2020-09-23 18:28:31',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'analysis_type_id' => 6,
                'name' => 'EOSINOFILOS MOCO NASAL',
                'description' => 'Eosinófilos Moco Nasal',
                'order' => 45,
                'created_at' => '2020-09-23 18:29:44',
                'updated_at' => '2020-09-23 18:29:44',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'analysis_type_id' => 7,
                'name' => 'SODIO',
                'description' => 'SODIO',
                'order' => 46,
                'created_at' => '2020-09-23 18:31:04',
                'updated_at' => '2020-09-23 18:31:04',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'analysis_type_id' => 7,
                'name' => 'CALCIO',
                'description' => 'CALCIO',
                'order' => 47,
                'created_at' => '2020-09-23 18:31:28',
                'updated_at' => '2020-09-23 18:31:28',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'analysis_type_id' => 7,
                'name' => 'HIERRO',
                'description' => 'HIERRO',
                'order' => 48,
                'created_at' => '2020-09-23 18:32:07',
                'updated_at' => '2020-09-23 18:32:14',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'analysis_type_id' => 8,
                'name' => 'GLUCOSA',
                'description' => 'GLUCOSA',
                'order' => 49,
                'created_at' => '2020-09-23 18:33:49',
                'updated_at' => '2020-09-23 18:34:27',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'analysis_type_id' => 8,
                'name' => 'GLUCOSA 2PP',
                'description' => 'GLUCOSA 2PP',
                'order' => 50,
                'created_at' => '2020-09-23 18:34:12',
                'updated_at' => '2020-09-23 18:34:12',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'analysis_type_id' => 8,
                'name' => 'COLESTEROL',
                'description' => 'COLESTEROL',
                'order' => 51,
                'created_at' => '2020-09-23 18:35:09',
                'updated_at' => '2020-09-23 18:35:09',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'analysis_type_id' => 8,
                'name' => 'TRIGLICERIDOS',
                'description' => 'TRIGLICERIDOS',
                'order' => 52,
                'created_at' => '2020-09-23 18:35:51',
                'updated_at' => '2020-09-23 18:35:51',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'analysis_type_id' => 8,
                'name' => 'TOLERANCIA A LA GLUCOSA',
                'description' => 'TOLERANCIA A LA GLUCOSA',
                'order' => 53,
                'created_at' => '2020-09-23 18:36:25',
                'updated_at' => '2020-09-23 18:36:25',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'analysis_type_id' => 8,
                'name' => 'COLESTEROL HDL',
                'description' => 'COLESTEROL HDL',
                'order' => 54,
                'created_at' => '2020-09-23 18:36:59',
                'updated_at' => '2020-09-23 18:36:59',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'analysis_type_id' => 8,
                'name' => 'COLESTEROL LDL',
                'description' => 'COLESTEROL LDL',
                'order' => 55,
                'created_at' => '2020-09-23 18:37:31',
                'updated_at' => '2020-09-23 18:37:31',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'analysis_type_id' => 8,
                'name' => 'LIPIDOS TOTALES',
                'description' => 'LIPIDOS TOTALES',
                'order' => 56,
                'created_at' => '2020-09-23 18:38:01',
                'updated_at' => '2020-09-23 18:38:01',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'analysis_type_id' => 8,
                'name' => 'UREA',
                'description' => 'UREA',
                'order' => 57,
                'created_at' => '2020-09-23 18:38:37',
                'updated_at' => '2020-09-23 18:38:37',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'analysis_type_id' => 8,
                'name' => 'ACIDO URICO',
                'description' => 'ACIDO URICO',
                'order' => 58,
                'created_at' => '2020-09-23 18:41:49',
                'updated_at' => '2020-09-23 18:41:49',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'analysis_type_id' => 8,
                'name' => 'GLOBULINA',
                'description' => 'GLOBULINA',
                'order' => 59,
                'created_at' => '2020-09-23 19:23:10',
                'updated_at' => '2020-09-23 19:23:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
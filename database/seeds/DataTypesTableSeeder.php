<?php

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'Usuario',
                'display_name_plural' => 'Usuarios',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menú',
                'display_name_plural' => 'Menús',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Rol',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'specialities',
                'slug' => 'specialities',
                'display_name_singular' => 'Especialidad',
                'display_name_plural' => 'Especialidades',
                'icon' => 'voyager-study',
                'model_name' => 'App\\Speciality',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"id","order_display_column":"id","order_direction":"asc","default_search_key":"id","scope":null}',
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'pages',
                'slug' => 'pages',
                'display_name_singular' => 'Pagina',
                'display_name_plural' => 'Paginas',
                'icon' => 'voyager-browser',
                'model_name' => 'App\\Page',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"id","order_display_column":"id","order_direction":"asc","default_search_key":"id","scope":null}',
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'blocks',
                'slug' => 'blocks',
                'display_name_singular' => 'Blocke',
                'display_name_plural' => 'Blockes',
                'icon' => 'voyager-params',
                'model_name' => 'App\\Block',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"id","order_display_column":"id","order_direction":"asc","default_search_key":"id","scope":null}',
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'analysis_types',
                'slug' => 'analysis-types',
                'display_name_singular' => 'Tipo de análisis',
                'display_name_plural' => 'Tipos de análisis',
                'icon' => 'voyager-list-add',
                'model_name' => 'App\\AnalysisType',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2020-09-19 15:13:45',
                'updated_at' => '2020-09-19 15:13:45',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'analysis',
                'slug' => 'analysis',
                'display_name_singular' => 'Análisis',
                'display_name_plural' => 'Análisis',
                'icon' => 'voyager-lab',
                'model_name' => 'App\\Analysi',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2020-09-19 15:16:31',
                'updated_at' => '2020-09-19 15:20:55',
            ),
        ));
        
        
    }
}
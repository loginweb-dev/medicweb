<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        // \DB::table('data_types')->delete();
        
        // \DB::table('data_types')->insert(array (
        //     0 => 
        //     array (
        //         'id' => 1,
        //         'name' => 'users',
        //         'slug' => 'users',
        //         'display_name_singular' => 'Usuario',
        //         'display_name_plural' => 'Usuarios',
        //         'icon' => 'voyager-person',
        //         'model_name' => 'TCG\\Voyager\\Models\\User',
        //         'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
        //         'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
        //         'description' => '',
        //         'generate_permissions' => 1,
        //         'server_side' => 0,
        //         'details' => NULL,
        //         'created_at' => '2020-08-05 19:21:36',
        //         'updated_at' => '2020-08-05 19:21:36',
        //     ),
        //     1 => 
        //     array (
        //         'id' => 2,
        //         'name' => 'menus',
        //         'slug' => 'menus',
        //         'display_name_singular' => 'Menú',
        //         'display_name_plural' => 'Menús',
        //         'icon' => 'voyager-list',
        //         'model_name' => 'TCG\\Voyager\\Models\\Menu',
        //         'policy_name' => NULL,
        //         'controller' => '',
        //         'description' => '',
        //         'generate_permissions' => 1,
        //         'server_side' => 0,
        //         'details' => NULL,
        //         'created_at' => '2020-08-05 19:21:36',
        //         'updated_at' => '2020-08-05 19:21:36',
        //     ),
        //     2 => 
        //     array (
        //         'id' => 3,
        //         'name' => 'roles',
        //         'slug' => 'roles',
        //         'display_name_singular' => 'Rol',
        //         'display_name_plural' => 'Roles',
        //         'icon' => 'voyager-lock',
        //         'model_name' => 'TCG\\Voyager\\Models\\Role',
        //         'policy_name' => NULL,
        //         'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
        //         'description' => '',
        //         'generate_permissions' => 1,
        //         'server_side' => 0,
        //         'details' => NULL,
        //         'created_at' => '2020-08-05 19:21:36',
        //         'updated_at' => '2020-08-05 19:21:36',
        //     ),
        //     3 => 
        //     array (
        //         'id' => 4,
        //         'name' => 'specialities',
        //         'slug' => 'specialities',
        //         'display_name_singular' => 'Especialidad',
        //         'display_name_plural' => 'Especialidades',
        //         'icon' => 'voyager-study',
        //         'model_name' => 'App\\Speciality',
        //         'policy_name' => NULL,
        //         'controller' => NULL,
        //         'description' => NULL,
        //         'generate_permissions' => 1,
        //         'server_side' => 1,
        //         'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
        //         'created_at' => '2020-08-05 19:32:49',
        //         'updated_at' => '2020-08-05 19:33:39',
        //     ),
        // ));
        
        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'users',
                'display_name_singular' => __('voyager::seeders.data_types.user.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.user.plural'),
                'icon'                  => 'voyager-person',
                'model_name'            => 'TCG\\Voyager\\Models\\User',
                'policy_name'           => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'menus');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'menus',
                'display_name_singular' => __('voyager::seeders.data_types.menu.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.menu.plural'),
                'icon'                  => 'voyager-list',
                'model_name'            => 'TCG\\Voyager\\Models\\Menu',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'roles');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'roles',
                'display_name_singular' => __('voyager::seeders.data_types.role.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.role.plural'),
                'icon'                  => 'voyager-lock',
                'model_name'            => 'TCG\\Voyager\\Models\\Role',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        
        // specialities ----------------------------------
        $dataType = $this->dataType('slug', 'specialities');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'specialities',
                'display_name_singular' => 'Especialidad',
                'display_name_plural'   => 'Especialidades',
                'icon'                  => 'voyager-study',
                'model_name'            => 'App\\Speciality',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => null,
                'server_side'           => 1,
                'details'               => [
                    'order_column'         => 'id',
                    'order_display_column' => 'id',
                    'order_direction'      => 'asc',
                    'default_search_key'   => 'id',
                    'scope'                => null
                ]
            ])->save();
        }
        //specialities ------------------------------------

        // pages ----------------------------------
        $dataType = $this->dataType('slug', 'pages');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'pages',
                'display_name_singular' => 'Pagina',
                'display_name_plural'   => 'Paginas',
                'icon'                  => 'voyager-browser',
                'model_name'            => 'App\\Page',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => null,
                'server_side'           => 1,
                'details'               => [
                    'order_column'         => 'id',
                    'order_display_column' => 'id',
                    'order_direction'      => 'asc',
                    'default_search_key'   => 'id',
                    'scope'                => null
                ]
            ])->save();
        }
        //pages ------------------------------------

        // blocks ----------------------------------
        $dataType = $this->dataType('slug', 'blocks');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'blocks',
                'display_name_singular' => 'Blocke',
                'display_name_plural'   => 'Blockes',
                'icon'                  => 'voyager-params',
                'model_name'            => 'App\\Block',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => null,
                'server_side'           => 1,
                'details'               => [
                    'order_column'         => 'id',
                    'order_display_column' => 'id',
                    'order_direction'      => 'asc',
                    'default_search_key'   => 'id',
                    'scope'                => null
                ]
            ])->save();
        }
        //blocks ------------------------------------

        
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
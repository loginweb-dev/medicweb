<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Herramientas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => NULL,
                'parameters' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Multimedia',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => 1,
                'order' => 1,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-19 15:19:23',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Usuarios',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => 1,
                'order' => 2,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-19 15:19:23',
                'route' => 'voyager.users.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Menus',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 1,
                'order' => 3,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-19 15:19:23',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Paginas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-paypal',
                'color' => NULL,
                'parent_id' => 1,
                'order' => 4,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-19 15:19:23',
                'route' => 'voyager.pages.index',
                'parameters' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Administracion',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-video',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => NULL,
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Clientes',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => 6,
                'order' => 1,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => 'customers.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Especialista',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-people',
                'color' => NULL,
                'parent_id' => 6,
                'order' => 2,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => 'specialists.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'Citas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-browser',
                'color' => NULL,
                'parent_id' => 6,
                'order' => 3,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => 'appointments.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Especialidades',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-study',
                'color' => NULL,
                'parent_id' => 6,
                'order' => 4,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => 'voyager.specialities.index',
                'parameters' => NULL,
            ),
            10 => 
            array (
                'id' => 14,
                'menu_id' => 3,
                'title' => 'facebbok',
                'url' => '#',
                'target' => '_self',
                'icon_class' => 'fab fa-facebook-f',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => NULL,
                'parameters' => NULL,
            ),
            11 => 
            array (
                'id' => 15,
                'menu_id' => 3,
                'title' => 'twitter',
                'url' => '#',
                'target' => '_self',
                'icon_class' => 'fab fa-twitter',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => NULL,
                'parameters' => NULL,
            ),
            12 => 
            array (
                'id' => 16,
                'menu_id' => 3,
                'title' => 'instagram',
                'url' => '#',
                'target' => '_self',
                'icon_class' => 'fab fa-instagram',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => NULL,
                'parameters' => NULL,
            ),
            13 => 
            array (
                'id' => 17,
                'menu_id' => 3,
                'title' => 'linkedin',
                'url' => '#',
                'target' => '_self',
                'icon_class' => 'fab fa-linkedin-in white-text mr-lg-4',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-09-17 16:36:01',
                'route' => NULL,
                'parameters' => NULL,
            ),
            14 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Tipos de análisis',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list-add',
                'color' => NULL,
                'parent_id' => 20,
                'order' => 2,
                'created_at' => '2020-09-19 15:13:45',
                'updated_at' => '2020-09-23 14:57:39',
                'route' => 'voyager.analysis-types.index',
                'parameters' => NULL,
            ),
            15 => 
            array (
                'id' => 19,
                'menu_id' => 1,
                'title' => 'Análisis',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lab',
                'color' => NULL,
                'parent_id' => 20,
                'order' => 1,
                'created_at' => '2020-09-19 15:16:31',
                'updated_at' => '2020-09-23 14:57:39',
                'route' => 'voyager.analysis.index',
                'parameters' => NULL,
            ),
            16 => 
            array (
                'id' => 20,
                'menu_id' => 1,
                'title' => 'Parametros',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-params',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2020-09-19 15:19:17',
                'updated_at' => '2020-09-19 15:19:31',
                'route' => NULL,
                'parameters' => '',
            ),
            17 => 
            array (
                'id' => 21,
                'menu_id' => 1,
                'title' => 'Horarios',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-watch',
                'color' => NULL,
                'parent_id' => 20,
                'order' => 3,
                'created_at' => '2020-09-23 14:57:13',
                'updated_at' => '2020-09-23 14:57:39',
                'route' => 'voyager.schedules.index',
                'parameters' => NULL,
            ),
            18 => 
            array (
                'id' => 22,
                'menu_id' => 1,
                'title' => 'Cuentas bancarias',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-credit-card',
                'color' => NULL,
                'parent_id' => 20,
                'order' => 4,
                'created_at' => '2020-09-28 18:50:55',
                'updated_at' => '2020-09-28 18:51:13',
                'route' => 'voyager.payment-accounts.index',
                'parameters' => NULL,
            ),
        ));
        
        
    }
}
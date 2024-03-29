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
                'order' => 2,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-10-15 21:37:57',
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
                'order' => 3,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-10-15 21:37:57',
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
                'order' => 1,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-10-15 21:37:57',
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
                'title' => 'Especialistas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-people',
                'color' => '#000000',
                'parent_id' => 6,
                'order' => 2,
                'created_at' => '2020-09-17 16:36:01',
                'updated_at' => '2020-10-20 16:37:28',
                'route' => 'specialists.index',
                'parameters' => 'null',
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
            19 => 
            array (
                'id' => 23,
                'menu_id' => 2,
                'title' => 'Políticas de privacidad',
                'url' => 'page/policies',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2020-10-15 21:04:45',
                'updated_at' => '2020-10-15 21:04:45',
                'route' => NULL,
                'parameters' => '',
            ),
            20 => 
            array (
                'id' => 24,
                'menu_id' => 2,
                'title' => 'Términos y condiciones',
                'url' => 'page/terms',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2020-10-15 21:05:19',
                'updated_at' => '2020-10-15 21:05:19',
                'route' => NULL,
                'parameters' => '',
            ),
            21 => 
            array (
                'id' => 25,
                'menu_id' => 1,
                'title' => 'Reportes',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-pie-graph',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2020-10-15 21:10:28',
                'updated_at' => '2020-10-15 21:13:27',
                'route' => NULL,
                'parameters' => '',
            ),
            22 => 
            array (
                'id' => 26,
                'menu_id' => 1,
                'title' => 'Consultas médicas',
                'url' => 'admin/reportes/appointments',
                'target' => '_self',
                'icon_class' => 'voyager-browser',
                'color' => '#000000',
                'parent_id' => 25,
                'order' => 1,
                'created_at' => '2020-12-29 15:26:59',
                'updated_at' => '2020-12-29 15:27:48',
                'route' => NULL,
                'parameters' => '',
            ),
            23 => 
            array (
                'id' => 27,
                'menu_id' => 1,
                'title' => 'Pagos a especialistas',
                'url' => 'admin/reportes/payments',
                'target' => '_self',
                'icon_class' => 'voyager-dollar',
                'color' => '#000000',
                'parent_id' => 25,
                'order' => 2,
                'created_at' => '2020-12-29 18:08:21',
                'updated_at' => '2020-12-29 18:10:29',
                'route' => NULL,
                'parameters' => '',
            ),
            24 => 
            array (
                'id' => 28,
                'menu_id' => 1,
                'title' => 'Contactos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-file-text',
                'color' => NULL,
                'parent_id' => 20,
                'order' => 5,
                'created_at' => '2021-02-18 22:08:34',
                'updated_at' => '2021-02-18 22:09:23',
                'route' => 'voyager.contacts.index',
                'parameters' => NULL,
            ),
            25 => 
            array (
                'id' => 29,
                'menu_id' => 1,
                'title' => 'Servicios de enfermería',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-certificate',
                'color' => NULL,
                'parent_id' => 20,
                'order' => 6,
                'created_at' => '2021-02-18 23:51:05',
                'updated_at' => '2021-02-24 15:51:23',
                'route' => 'voyager.services.index',
                'parameters' => NULL,
            ),
            26 => 
            array (
                'id' => 30,
                'menu_id' => 1,
                'title' => 'Gráficos',
                'url' => 'admin/reportes/charts',
                'target' => '_self',
                'icon_class' => 'voyager-bar-chart',
                'color' => '#000000',
                'parent_id' => 25,
                'order' => 3,
                'created_at' => '2021-03-11 00:48:34',
                'updated_at' => '2021-03-11 00:52:28',
                'route' => NULL,
                'parameters' => '',
            ),
        ));
        
        
    }
}
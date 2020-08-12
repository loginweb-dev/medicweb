<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site.title',
                'display_name' => 'Título del sitio',
                'value' => 'MedicWeb v1.0',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Site',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'site.description',
                'display_name' => 'Descripción del sitio',
                'value' => 'Descripción del sitio',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Site',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'site.logo',
                'display_name' => 'Logo del sitio',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Site',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'display_name' => 'ID de rastreo de Google Analytics',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'site.page',
                'display_name' => 'Pagina',
                'value' => 'landingpage-medicweb',
                'details' => '',
                'type' => 'text',
                'order' => 5,
                'group' => 'Site',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'admin.bg_image',
                'display_name' => 'Imagen de fondo del administrador',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 1,
                'group' => 'Admin',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'admin.title',
                'display_name' => 'Título del administrador',
                'value' => 'MedicWeb v1.0',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'admin.description',
                'display_name' => 'Descripción del administrador',
                'value' => 'Bienvenido a Voyager. El administrador que le faltaba a Laravel',
                'details' => '',
                'type' => 'text',
                'order' => 3,
                'group' => 'Admin',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'admin.loader',
                'display_name' => 'Imagen de carga del administrador',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'admin.icon_image',
                'display_name' => 'Ícono del administrador',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'admin.google_analytics_client_id',
            'display_name' => 'ID de Cliente para Google Analytics (usado para el tablero de administrador)',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 6,
                'group' => 'Admin',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'citas.duracion',
                'display_name' => 'Duración',
                'value' => '15',
                'details' => NULL,
                'type' => 'text',
                'order' => 7,
                'group' => 'Citas',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'server-streaming.url_server',
                'display_name' => 'url server',
                'value' => 'virtual.histream.live',
                'details' => NULL,
                'type' => 'text',
                'order' => 8,
                'group' => 'Server Streaming',
            ),
        ));
        
        
    }
}
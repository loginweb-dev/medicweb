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
                'value' => 'LiveMedic',
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
            'value' => 'Software Inteligente para crear y Administrar Consultorios Medicos (Tele Salud)',
                'details' => '',
                'type' => 'text_area',
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
                'order' => 12,
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
                'order' => 11,
                'group' => 'Site',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'admin.title',
                'display_name' => 'Título del administrador',
                'value' => 'LiveMedic',
                'details' => NULL,
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'admin.description',
                'display_name' => 'Descripción del administrador',
            'value' => 'Software Inteligente para crear y Administrar Consultorios Medicos (Tele Medicina)',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 2,
                'group' => 'Admin',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'admin.bg_image',
                'display_name' => 'Imagen de fondo del administrador',
                'value' => '',
                'details' => NULL,
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'admin.loader',
                'display_name' => 'Imagen de carga del administrador',
                'value' => '',
                'details' => NULL,
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
                'details' => NULL,
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
                'details' => NULL,
                'type' => 'text',
                'order' => 6,
                'group' => 'Admin',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'admin.pagination',
                'display_name' => 'Paginacion',
                'value' => '6',
                'details' => NULL,
                'type' => 'text',
                'order' => 7,
                'group' => 'Admin',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'whatsapp.phone',
                'display_name' => 'Numero de Móvil',
                'value' => '59172841731',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Whatsapp',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'whatsapp.popupMessage',
                'display_name' => 'Titulo',
                'value' => 'Hola, Necesitas Ayuda?',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Whatsapp',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'whatsapp.message',
                'display_name' => 'Mensaje de Bienvenida',
                'value' => 'Quiero mas Info..',
                'details' => '',
                'type' => 'text_area',
                'order' => 3,
                'group' => 'Whatsapp',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'whatsapp.headerTitle',
                'display_name' => 'Titulo Header',
                'value' => 'Mi Chat',
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Whatsapp',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'whatsapp.color',
                'display_name' => 'Color',
                'value' => '#000000',
                'details' => '',
                'type' => 'text',
                'order' => 5,
                'group' => 'Whatsapp',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'whatsapp.buttonImage',
                'display_name' => 'Imagen del boton',
                'value' => 'settings/October2020/fx7RVoFFGbWQf4LgpswO.png',
                'details' => '',
                'type' => 'image',
                'order' => 6,
                'group' => 'Whatsapp',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'whatsapp.position',
                'display_name' => 'Posicion del boton',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 7,
                'group' => 'Whatsapp',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'whatsapp.autoOpenTimeout',
                'display_name' => 'Tiempo de espera para abrir',
                'value' => '50000',
                'details' => '',
                'type' => 'text',
                'order' => 8,
                'group' => 'Whatsapp',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'whatsapp.size',
                'display_name' => 'Tamanio del boton',
                'value' => '65px',
                'details' => '',
                'type' => 'text',
                'order' => 9,
                'group' => 'Whatsapp',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'rrss.facebook',
                'display_name' => 'Facebbok',
                'value' => NULL,
                'details' => NULL,
                'type' => 'text',
                'order' => 1,
                'group' => 'RRSS',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'rrss.instagram',
                'display_name' => 'Instagram',
                'value' => NULL,
                'details' => NULL,
                'type' => 'text',
                'order' => 2,
                'group' => 'RRSS',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'rrss.twitter',
                'display_name' => 'Twitter',
                'value' => NULL,
                'details' => NULL,
                'type' => 'text',
                'order' => 3,
                'group' => 'RRSS',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'citas.duracion',
                'display_name' => 'Duración',
                'value' => '30',
                'details' => NULL,
                'type' => 'text',
                'order' => 1,
                'group' => 'Citas',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'server-streaming.url_server',
                'display_name' => 'url server',
                'value' => 'jitsi.loginweb.dev',
                'details' => NULL,
                'type' => 'text',
                'order' => 1,
                'group' => 'Server Streaming',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'site.telefonos',
                'display_name' => 'Telefonos',
                'value' => NULL,
                'details' => NULL,
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'site.direccion',
                'display_name' => 'Dirección',
                'value' => NULL,
                'details' => NULL,
                'type' => 'text',
                'order' => 5,
                'group' => 'Site',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'site.ciudad',
                'display_name' => 'Ciudad',
                'value' => NULL,
                'details' => NULL,
                'type' => 'text',
                'order' => 10,
                'group' => 'Site',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'server-streaming.notificacion_sms',
                'display_name' => 'Notificación SMS',
                'value' => '1',
                'details' => NULL,
                'type' => 'checkbox',
                'order' => 13,
                'group' => 'Server Streaming',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'server-streaming.celular_notificacion',
                'display_name' => 'Celular de notificación',
                'value' => '75199157',
                'details' => NULL,
                'type' => 'text',
                'order' => 14,
                'group' => 'Server Streaming',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;
class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        // \DB::table('settings')->delete();
        
        // \DB::table('settings')->insert(array (
        //     0 => 
        //     array (
        //         'id' => 1,
        //         'key' => 'site.title',
        //         'display_name' => 'Título del sitio',
        //         'value' => 'MedicWeb v1.0',
        //         'details' => '',
        //         'type' => 'text',
        //         'order' => 1,
        //         'group' => 'Site',
        //     ),
        //     1 => 
        //     array (
        //         'id' => 2,
        //         'key' => 'site.description',
        //         'display_name' => 'Descripción del sitio',
        //         'value' => 'Descripción del sitio',
        //         'details' => '',
        //         'type' => 'text',
        //         'order' => 2,
        //         'group' => 'Site',
        //     ),
        //     2 => 
        //     array (
        //         'id' => 3,
        //         'key' => 'site.logo',
        //         'display_name' => 'Logo del sitio',
        //         'value' => '',
        //         'details' => '',
        //         'type' => 'image',
        //         'order' => 3,
        //         'group' => 'Site',
        //     ),
        //     3 => 
        //     array (
        //         'id' => 4,
        //         'key' => 'site.google_analytics_tracking_id',
        //         'display_name' => 'ID de rastreo de Google Analytics',
        //         'value' => NULL,
        //         'details' => '',
        //         'type' => 'text',
        //         'order' => 4,
        //         'group' => 'Site',
        //     ),
        //     4 => 
        //     array (
        //         'id' => 5,
        //         'key' => 'site.page',
        //         'display_name' => 'Pagina',
        //         'value' => 'landingpage-medicweb',
        //         'details' => '',
        //         'type' => 'text',
        //         'order' => 5,
        //         'group' => 'Site',
        //     ),
        //     5 => 
        //     array (
        //         'id' => 6,
        //         'key' => 'admin.bg_image',
        //         'display_name' => 'Imagen de fondo del administrador',
        //         'value' => '',
        //         'details' => '',
        //         'type' => 'image',
        //         'order' => 1,
        //         'group' => 'Admin',
        //     ),
        //     6 => 
        //     array (
        //         'id' => 7,
        //         'key' => 'admin.title',
        //         'display_name' => 'Título del administrador',
        //         'value' => 'MedicWeb v1.0',
        //         'details' => '',
        //         'type' => 'text',
        //         'order' => 2,
        //         'group' => 'Admin',
        //     ),
        //     7 => 
        //     array (
        //         'id' => 8,
        //         'key' => 'admin.description',
        //         'display_name' => 'Descripción del administrador',
        //         'value' => 'Bienvenido a Voyager. El administrador que le faltaba a Laravel',
        //         'details' => '',
        //         'type' => 'text',
        //         'order' => 3,
        //         'group' => 'Admin',
        //     ),
        //     8 => 
        //     array (
        //         'id' => 9,
        //         'key' => 'admin.loader',
        //         'display_name' => 'Imagen de carga del administrador',
        //         'value' => '',
        //         'details' => '',
        //         'type' => 'image',
        //         'order' => 4,
        //         'group' => 'Admin',
        //     ),
        //     9 => 
        //     array (
        //         'id' => 10,
        //         'key' => 'admin.icon_image',
        //         'display_name' => 'Ícono del administrador',
        //         'value' => '',
        //         'details' => '',
        //         'type' => 'image',
        //         'order' => 5,
        //         'group' => 'Admin',
        //     ),
        //     10 => 
        //     array (
        //         'id' => 11,
        //         'key' => 'admin.google_analytics_client_id',
        //     'display_name' => 'ID de Cliente para Google Analytics (usado para el tablero de administrador)',
        //         'value' => NULL,
        //         'details' => '',
        //         'type' => 'text',
        //         'order' => 6,
        //         'group' => 'Admin',
        //     ),
        //     11 => 
        //     array (
        //         'id' => 12,
        //         'key' => 'citas.duracion',
        //         'display_name' => 'Duración',
        //         'value' => '15',
        //         'details' => NULL,
        //         'type' => 'text',
        //         'order' => 7,
        //         'group' => 'Citas',
        //     ),
        //     12 => 
        //     array (
        //         'id' => 13,
        //         'key' => 'server-streaming.url_server',
        //         'display_name' => 'url server',
        //         'value' => 'virtual.histream.live',
        //         'details' => NULL,
        //         'type' => 'text',
        //         'order' => 8,
        //         'group' => 'Server Streaming',
        //     ),
        // ));


        // ----------------------- SITE ------------------------------------
        //------------------------------------------------------------------
        $count=1;
        $setting = $this->findSetting('site.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.title'),
                'value'        => 'MedicWeb v1.0',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Site',
            ])->save();
        }
        $setting = $this->findSetting('site.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.description'),
                'value'        => 'Software Inteligente para crear y Administrar Consultorios Medicos (Tele Salud)',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => $count++,
                'group'        => 'Site',
            ])->save();
        }
        $setting = $this->findSetting('site.logo');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.logo'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => $count++,
                'group'        => 'Site',
            ])->save();
        }
        $setting = $this->findSetting('site.google_analytics_tracking_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.google_analytics_tracking_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Site',
            ])->save();
        }
        $setting = $this->findSetting('site.page');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Pagina',
                'value'        => 'landingpage-medicweb',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Site',
            ])->save();
        }
        //----------------------------SITE ----------------------------------------



        //------------------------------- admin-------------------------------
        //---------------------------------------------------------------------
        $count=1;
        $setting = $this->findSetting('admin.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.title'),
                'value'        => 'MedicWeb v1.0',
                'details'      => null,
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Admin',
            ])->save();
        }
        $setting = $this->findSetting('admin.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.description'),
                'value'        => 'Software Inteligente para crear y Administrar Consultorios Medicos (Tele Medicina)',
                'details'      => null,
                'type'         => 'text_area',
                'order'        => $count++,
                'group'        => 'Admin',
            ])->save();
        }
        $setting = $this->findSetting('admin.bg_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.background_image'),
                'value'        => '',
                'details'      => null,
                'type'         => 'image',
                'order'        => $count++,
                'group'        => 'Admin',
            ])->save();
        }
        $setting = $this->findSetting('admin.loader');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.loader'),
                'value'        => '',
                'details'      => null,
                'type'         => 'image',
                'order'        => $count++,
                'group'        => 'Admin',
            ])->save();
        }
        $setting = $this->findSetting('admin.icon_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.icon_image'),
                'value'        => '',
                'details'      => null,
                'type'         => 'image',
                'order'        => $count++,
                'group'        => 'Admin',
            ])->save();
        }
        $setting = $this->findSetting('admin.google_analytics_client_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.google_analytics_client_id'),
                'value'        => '',
                'details'      => null,
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Admin',
            ])->save();
        }
        $setting = $this->findSetting('admin.pagination');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Paginacion',
                'value'        => '6',
                'details'      => null,
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Admin',
            ])->save();
        }
        //------------------------ADMIN ----------------------------

        // ---------------------Whatsapp ------------------------------------
        // ------------------------------------------------------------
        $count=1;
        $setting = $this->findSetting('whatsapp.phone');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Numero de Móvil',
                'value'        => '59171130523',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        $setting = $this->findSetting('whatsapp.popupMessage');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Titulo',
                'value'        => 'Hola, Necesitas Ayuda?',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        $setting = $this->findSetting('whatsapp.message');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Mensaje de Bienvenida',
                'value'        => 'Quiero mas Info..',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        $setting = $this->findSetting('whatsapp.headerTitle');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Titulo Header',
                'value'        => 'Mi Chat',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        $setting = $this->findSetting('whatsapp.color');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Color',
                'value'        => '#5991FB',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        $setting = $this->findSetting('whatsapp.buttonImage');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Imagen del boton',
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        $setting = $this->findSetting('whatsapp.position');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Posicion del boton',
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        $setting = $this->findSetting('whatsapp.autoOpenTimeout');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Tiempo de espera para abrir',
                'value'        => '50000',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        $setting = $this->findSetting('whatsapp.size');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Tamanio del boton',
                'value'        => '72px',
                'details'      => '',
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Whatsapp',
            ])->save();
        }
        //----------------------- Whatsapp----------------------------

        // ---------------------RRSS ------------------------------------
        // ------------------------------------------------------------
        $count=1;
        $setting = $this->findSetting('rrss.facebook');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Facebbok',
                'value'        => null,
                'details'      => null,
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'RRSS',
            ])->save();
        }
        $setting = $this->findSetting('rrss.instagram');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Instagram',
                'value'        => null,
                'details'      => null,
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'RRSS',
            ])->save();
        }
        $setting = $this->findSetting('rrss.twitter');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Twitter',
                'value'        => null,
                'details'      => null,
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'RRSS',
            ])->save();
        }
        //------------------------ rrsS -----------------------------



        //------------------------------- CITAS-------------------------------
        //---------------------------------------------------------------------
        $count=1;
        $setting = $this->findSetting('citas.duracion');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Duración',
                'value'        => 15,
                'details'      => null,
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Citas',
            ])->save();
        }
        //------------------------------ CITAS-----------------------------


        //------------------------------- Server Streaming-------------------------------
        //---------------------------------------------------------------------
        $count=1;
        $setting = $this->findSetting('server-streaming.url_server');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'url server',
                'value'        => 'virtual.histream.live',
                'details'      => null,
                'type'         => 'text',
                'order'        => $count++,
                'group'        => 'Server Streaming',
            ])->save();
        }
        //------------------------------ Server Streaming-----------------------------


    }

    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
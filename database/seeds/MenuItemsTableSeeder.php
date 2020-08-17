<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        // \DB::table('menu_items')->delete();
        
        // \DB::table('menu_items')->insert(array (
        //     0 => 
        //     array (
        //         'id' => 1,
        //         'menu_id' => 1,
        //         'title' => 'Inicio',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-boat',
        //         'color' => NULL,
        //         'parent_id' => NULL,
        //         'order' => 1,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:16:41',
        //         'route' => 'voyager.dashboard',
        //         'parameters' => NULL,
        //     ),
        //     1 => 
        //     array (
        //         'id' => 2,
        //         'menu_id' => 1,
        //         'title' => 'Multimedia',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-images',
        //         'color' => NULL,
        //         'parent_id' => 5,
        //         'order' => 3,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:18:24',
        //         'route' => 'voyager.media.index',
        //         'parameters' => NULL,
        //     ),
        //     2 => 
        //     array (
        //         'id' => 3,
        //         'menu_id' => 1,
        //         'title' => 'Usuarios',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-person',
        //         'color' => NULL,
        //         'parent_id' => 11,
        //         'order' => 1,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:17:53',
        //         'route' => 'voyager.users.index',
        //         'parameters' => NULL,
        //     ),
        //     3 => 
        //     array (
        //         'id' => 4,
        //         'menu_id' => 1,
        //         'title' => 'Roles',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-lock',
        //         'color' => NULL,
        //         'parent_id' => 11,
        //         'order' => 2,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:17:59',
        //         'route' => 'voyager.roles.index',
        //         'parameters' => NULL,
        //     ),
        //     4 => 
        //     array (
        //         'id' => 5,
        //         'menu_id' => 1,
        //         'title' => 'Herramientas',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-tools',
        //         'color' => NULL,
        //         'parent_id' => NULL,
        //         'order' => 3,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:18:24',
        //         'route' => NULL,
        //         'parameters' => NULL,
        //     ),
        //     5 => 
        //     array (
        //         'id' => 6,
        //         'menu_id' => 1,
        //         'title' => 'Diseñador de Menús',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-list',
        //         'color' => NULL,
        //         'parent_id' => 5,
        //         'order' => 1,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:17:43',
        //         'route' => 'voyager.menus.index',
        //         'parameters' => NULL,
        //     ),
        //     6 => 
        //     array (
        //         'id' => 7,
        //         'menu_id' => 1,
        //         'title' => 'Base de Datos',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-data',
        //         'color' => NULL,
        //         'parent_id' => 5,
        //         'order' => 2,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:17:43',
        //         'route' => 'voyager.database.index',
        //         'parameters' => NULL,
        //     ),
        //     7 => 
        //     array (
        //         'id' => 8,
        //         'menu_id' => 1,
        //         'title' => 'Compás',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-compass',
        //         'color' => NULL,
        //         'parent_id' => 5,
        //         'order' => 4,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:18:24',
        //         'route' => 'voyager.compass.index',
        //         'parameters' => NULL,
        //     ),
        //     8 => 
        //     array (
        //         'id' => 9,
        //         'menu_id' => 1,
        //         'title' => 'BREAD',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-bread',
        //         'color' => NULL,
        //         'parent_id' => 5,
        //         'order' => 5,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:18:24',
        //         'route' => 'voyager.bread.index',
        //         'parameters' => NULL,
        //     ),
        //     9 => 
        //     array (
        //         'id' => 10,
        //         'menu_id' => 1,
        //         'title' => 'Parámetros',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-settings',
        //         'color' => NULL,
        //         'parent_id' => 5,
        //         'order' => 6,
        //         'created_at' => '2020-08-05 18:16:41',
        //         'updated_at' => '2020-08-05 18:18:30',
        //         'route' => 'voyager.settings.index',
        //         'parameters' => NULL,
        //     ),
        //     10 => 
        //     array (
        //         'id' => 11,
        //         'menu_id' => 1,
        //         'title' => 'Seguridad',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-lock',
        //         'color' => '#000000',
        //         'parent_id' => NULL,
        //         'order' => 2,
        //         'created_at' => '2020-08-05 18:17:15',
        //         'updated_at' => '2020-08-05 18:17:47',
        //         'route' => NULL,
        //         'parameters' => '',
        //     ),
        //     11 => 
        //     array (
        //         'id' => 12,
        //         'menu_id' => 1,
        //         'title' => 'Administración',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-video',
        //         'color' => '#000000',
        //         'parent_id' => NULL,
        //         'order' => 4,
        //         'created_at' => '2020-08-05 18:17:15',
        //         'updated_at' => '2020-08-05 19:38:23',
        //         'route' => NULL,
        //         'parameters' => '',
        //     ),
        //     12 => 
        //     array (
        //         'id' => 13,
        //         'menu_id' => 1,
        //         'title' => 'Especialistas',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-people',
        //         'color' => '#000000',
        //         'parent_id' => 12,
        //         'order' => 2,
        //         'created_at' => '2020-08-05 18:17:15',
        //         'updated_at' => '2020-08-11 00:43:15',
        //         'route' => 'specialists.index',
        //         'parameters' => 'null',
        //     ),
        //     13 => 
        //     array (
        //         'id' => 14,
        //         'menu_id' => 1,
        //         'title' => 'Especialidades',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-study',
        //         'color' => '#000000',
        //         'parent_id' => 12,
        //         'order' => 4,
        //         'created_at' => '2020-08-05 19:32:49',
        //         'updated_at' => '2020-08-11 12:57:56',
        //         'route' => 'voyager.specialities.index',
        //         'parameters' => 'null',
        //     ),
        //     14 => 
        //     array (
        //         'id' => 15,
        //         'menu_id' => 1,
        //         'title' => 'Clientes',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-person',
        //         'color' => '#000000',
        //         'parent_id' => 12,
        //         'order' => 1,
        //         'created_at' => '2020-08-11 00:25:39',
        //         'updated_at' => '2020-08-11 00:43:15',
        //         'route' => 'customers.index',
        //         'parameters' => NULL,
        //     ),
        //     15 => 
        //     array (
        //         'id' => 16,
        //         'menu_id' => 1,
        //         'title' => 'Citas',
        //         'url' => '',
        //         'target' => '_self',
        //         'icon_class' => 'voyager-browser',
        //         'color' => '#000000',
        //         'parent_id' => 12,
        //         'order' => 3,
        //         'created_at' => '2020-08-11 12:57:51',
        //         'updated_at' => '2020-08-11 12:57:56',
        //         'route' => 'appointments.index',
        //         'parameters' => NULL,
        //     ),
        // ));
        
        $menu = Menu::where('name', 'admin')->firstOrFail();

       
        $toolsMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.tools'),
            'url'     => '',
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $count = 0;
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.media'),
            'url'     => '',
            'route'   => 'voyager.media.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-images',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => $count++
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.users'),
            'url'     => '',
            'route'   => 'voyager.users.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => $count++
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Menus',
            'url'     => '',
            'route'   => 'voyager.menus.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-list',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => $count++
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Paginas',
            'url'     => '',
            'route'   => 'voyager.pages.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-paypal',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => $count++,
            ])->save();
        }


        //-----------------ADMINISTRACION------------------------
        $AdminMenu = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Administracion',
            'url'     => '',
        ]);
        if (!$AdminMenu->exists) {
            $AdminMenu->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-video',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }
        
        $count = 1;
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Clientes',
            'url'     => '',
            'route'   => 'customers.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => $AdminMenu->id,
                'order'      => $count++,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Especialista',
            'url'     => '',
            'route'   => 'specialists.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-people',
                'color'      => null,
                'parent_id'  => $AdminMenu->id,
                'order'      => $count++,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Citas',
            'url'     => '',
            'route'   => 'appointments.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-browser',
                'color'      => null,
                'parent_id'  => $AdminMenu->id,
                'order'      => $count++,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Citas',
            'url'     => '',
            'route'   => 'appointments.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-browser',
                'color'      => null,
                'parent_id'  => $AdminMenu->id,
                'order'      => $count++,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Especialidades',
            'url'     => '',
            'route'   => 'voyager.specialities.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-study',
                'color'      => null,
                'parent_id'  => $AdminMenu->id,
                'order'      => $count++,
            ])->save();
        }
        //-------------------------------------------------------------------

        // ------------------- Menu Landing Page ----------------------------------------
        // -------------------------------------------------
        $menu = Menu::where('name', 'LandingPage')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Documentacion',
            'url'     => '/docs',
            'route'   => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Politicas y Privacidad',
            'url'     => '/politica-privacidad',
            'route'   => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Terminos y Condiciones',
            'url'     => '/terminos-condiones',
            'route'   => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }
        // ------------------- Menu Landing Page ----------------------------------------

        // Menu Social ----------------------------------------
        //----------------------------------------------------
        $menu = Menu::where('name', 'social')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'facebbok',
            'url'     => '#',
            'route'   => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'fab fa-facebook-f',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'twitter',
            'url'     => '#',
            'route'   => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'fab fa-twitter',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'instagram',
            'url'     => '#',
            'route'   => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'fab fa-instagram',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }
        
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'linkedin',
            'url'     => '#',
            'route'   => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'fab fa-linkedin-in white-text mr-lg-4',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 4,
            ])->save();
        }
        // Menu Social ----------------------------------------
    }
}
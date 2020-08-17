<?php

use Illuminate\Database\Seeder;
use App\Page;
use App\Block;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::create([
            'name'      => 'Landingpage MedicWeb',
            'slug'      => 'landingpage-medicweb',
            'description' => 'Pagina de Destino para Consultorios Medico',
            'direction' => 'pages.landing',
            'user_id' => 1,
            'details'   => null
            ]);

        $count=1;
        Block::create([
            'name'        => 'treatments',
            'title'       => 'Tratamientos profesionales',
            'type'        => 'dinamyc-data',
            'description' => 'Tratamientos profesionales',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => null
            ]);
        Block::create([
            'name'        => 'galery',
            'title'       => 'Galeria de Fotos',
            'type'        => 'dinamyc-data',
            'description' => 'Galeria de Fotos',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => null
            ]);
        Block::create([
            'name'        => 'services',
            'title'       => 'Servicios',
            'type'        => 'dinamyc-data',
            'description' => 'Servicios',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => null
            ]);
        Block::create([
            'name'        => 'streak',
            'title'       => 'Contador de Servicios',
            'type'        => 'dinamyc-data',
            'description' => 'Contador Servicios',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => null
            ]);
        Block::create([
            'name'        => 'doctors',
            'title'       => 'Equipo Medico',
            'type'        => 'dinamyc-data',
            'description' => 'Equipo Medico',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => null
            ]);
        Block::create([
            'name'        => 'pricing',
            'title'       => 'Precios de los Servicios',
            'type'        => 'dinamyc-data',
            'description' => 'Precios de los Servicios',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => null
            ]);
        Block::create([
            'name'        => 'testimonials',
            'title'       => 'Testimonio de Clientes',
            'type'        => 'dinamyc-data',
            'description' => 'Testimonios de Clientes',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => null
            ]);
    }


}

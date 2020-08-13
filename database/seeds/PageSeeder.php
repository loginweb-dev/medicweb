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
            'description' => 'Pagina de Destino para Consultorio Medico',
            'direction' => 'pages.landing',
            'user_id' => 1,
            'details'   => null
        ]);
    }
}

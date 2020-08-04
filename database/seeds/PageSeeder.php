<?php

use Illuminate\Database\Seeder;
use App\Page;
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
            'description' => 'Pagina de Destino para Tele Medicina',
            'direction' => 'pages.landing',
            'user_id' => 1,
            'details'   => null
        ]);
    }
}

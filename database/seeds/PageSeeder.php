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
            'details'   => json_encode([
                    'title' => [
                        'type' => 'text',
                        'name' => 'title',
                        'label' => 'Titulo',
                        'value' => 'Make purchases with our app',
                        'width' => 6
                    ],
                    'image1' => [
                        'type' => 'image',
                        'name' => 'image1',
                        'label' => 'Imagen (600x670)',
                        'value' => 'myimage.png',
                        'width' => 6
                    ],
                    'button_text1' => [
                        'type' => 'text',
                        'name' => 'button_text1',
                        'label' => 'Texto Boton #1',
                        'value' => 'DOWNLOAD',
                        'width' => 6
                    ],
                    'button_link1' => [
                        'type' => 'text',
                        'name' => 'button_link1',
                        'label' => 'Link Text #1',
                        'value' => '#',
                        'width' => 6
                    ],
                    'button_text2' => [
                        'type' => 'text',
                        'name' => 'button_text2',
                        'label' => 'Texto Boton #2',
                        'value' => 'LEAR MORE',
                        'width' => 6
                    ],
                    'button_link2' => [
                        'type' => 'text',
                        'name' => 'button_link2',
                        'label' => 'Link Text #2',
                        'value' => '#',
                        'width' => 6
                    ],
                    'description_data' => [
                        'type' => 'rich_text_box',
                        'name' => 'description_data',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 12
                    ]
                ])
            ]);

        $count=1;
        Block::create([
            'name'        => 'treatments',
            'title'       => 'Tratamientos profesionales',
            'type'        => 'dinamyc-data',
            'description' => 'Tratamientos profesionales',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => json_encode([
                    'title' => [
                        'type' => 'text',
                        'name' => 'title',
                        'label' => 'Titulo',
                        'value' => 'Make purchases with our app',
                        'width' => 4
                    ],
                    'description_data' => [
                        'type' => 'rich_text_box',
                        'name' => 'description_data',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 8
                    ],
                    'space' => [
                        'type'  => 'space',
                        'name'  => 'space',
                    ],
                    'icon1' => [
                        'type' => 'text',
                        'name' => 'icon1',
                        'label' => 'Icono',
                        'value' => 'fas fa-heart blue-text mt-3 fa-3x my-4',
                        'width' => 2
                    ],
                    'title1' => [
                        'type' => 'text',
                        'name' => 'title1',
                        'label' => 'Experience',
                        'value' => 'Make purchases with our app',
                        'width' => 2
                    ],
                    'description_data1' => [
                        'type' => 'rich_text_box',
                        'name' => 'description_data1',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 8
                    ],
                    'space2' => [
                        'type'  => 'space',
                        'name'  => 'space2',
                    ],
                    'icon2' => [
                        'type' => 'text',
                        'name' => 'icon2',
                        'label' => 'Icono',
                        'value' => 'far fa-eye blue-text mt-3 fa-3x my-4',
                        'width' => 2
                    ],
                    'title2' => [
                        'type' => 'text',
                        'name' => 'title2',
                        'label' => 'Experience',
                        'value' => 'Make purchases with our app',
                        'width' => 2
                    ],
                    'description_data2' => [
                        'type' => 'rich_text_box',
                        'name' => 'description_data2',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 8
                    ],
                    'space3' => [
                        'type'  => 'space',
                        'name'  => 'space3',
                    ],
                    'icon3' => [
                        'type' => 'text',
                        'name' => 'icon3',
                        'label' => 'Icono',
                        'value' => 'fas fa-briefcase-medical blue-text mt-3 fa-3x my-4',
                        'width' => 2
                    ],
                    'title3' => [
                        'type' => 'text',
                        'name' => 'title3',
                        'label' => 'Qualifications',
                        'value' => 'Make purchases with our app',
                        'width' => 2
                    ],
                    'description_data3' => [
                        'type' => 'rich_text_box',
                        'name' => 'description_data3',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 8
                    ]
                ])
            ]);
        Block::create([
            'name'        => 'galery',
            'title'       => 'Galeria de Fotos',
            'type'        => 'dinamyc-data',
            'description' => 'Galeria de Fotos',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => json_encode([
                    'title1' => [
                        'type' => 'text',
                        'name' => 'title1',
                        'label' => 'Titulo',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'image1' => [
                        'type' => 'image',
                        'name' => 'image1',
                        'label' => 'Imagen (781x521)',
                        'value' => 'image1.png',
                        'width' => 6
                    ],
                    'space1' => [
                        'type'  => 'space',
                        'name'  => 'space1',
                    ],
                    'title2' => [
                        'type' => 'text',
                        'name' => 'title2',
                        'label' => 'Titulo',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'image2' => [
                        'type' => 'image',
                        'name' => 'image2',
                        'label' => 'Imagen (781x521)',
                        'value' => 'image1.png',
                        'width' => 6
                    ],
                    'space2' => [
                        'type'  => 'space',
                        'name'  => 'space2',
                    ],
                    'title3' => [
                        'type' => 'text',
                        'name' => 'title3',
                        'label' => 'Titulo',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'image3' => [
                        'type' => 'image',
                        'name' => 'image3',
                        'label' => 'Imagen (781x521)',
                        'value' => 'image1.png',
                        'width' => 6
                    ],
                    'space3' => [
                        'type'  => 'space',
                        'name'  => 'space3',
                    ],
                    'title4' => [
                        'type' => 'text',
                        'name' => 'title4',
                        'label' => 'Titulo',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'image4' => [
                        'type' => 'image',
                        'name' => 'image4',
                        'label' => 'Imagen (781x521)',
                        'value' => 'image1.png',
                        'width' => 6
                    ]
                ])
            ]);
        Block::create([
            'name'        => 'services',
            'title'       => 'Servicios',
            'type'        => 'dinamyc-data',
            'description' => 'Servicios',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => json_encode([
                    'title1' => [
                        'type' => 'text',
                        'name' => 'title1',
                        'label' => 'Titulo',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'parrafo1' => [
                        'type' => 'text_area',
                        'name' => 'parrafo1',
                        'label' => 'Titulo',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'description_data1' => [
                        'type' => 'rich_text_box',
                        'name' => 'description_data1',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 12
                    ],
                    'btn1' => [
                        'type'   => 'text',
                        'name'   => 'btn1',
                        'label'  => 'Nombre del Boton grupo1',
                        'value'  => 'Aprende mas',
                        'width'  => 4
                    ],
                    'btn_action1' => [
                        'type'   => 'text',
                        'name'   => 'btn_action1',
                        'label'  => 'Accion del Boton grupo1',
                        'value'  => '/miaccion',
                        'width'  => 4
                    ],
                    'image1' => [
                        'type' => 'image',
                        'name' => 'image1',
                        'label' => 'Imagen (781x521)',
                        'value' => 'image1.png',
                        'width' => 4
                    ],
                ])
            ]);
        Block::create([
            'name'        => 'streak',
            'title'       => 'Contador de Servicios',
            'type'        => 'dinamyc-data',
            'description' => 'Contador Servicios',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => json_encode([
                    'title1' => [
                        'type' => 'text',
                        'name' => 'title1',
                        'label' => 'Titulo',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'image1' => [
                        'type' => 'image',
                        'name' => 'image1',
                        'label' => 'Image (1920x1080)',
                        'value' => 'image1.png',
                        'width' => 6
                    ],
                    'label1' => [
                        'type' => 'text',
                        'name' => 'label1',
                        'label' => 'Label 1',
                        'value' => '+950',
                        'width' => 6
                    ],
                    'parrafo1' => [
                        'type' => 'text_area',
                        'name' => 'parrafo1',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'label2' => [
                        'type' => 'text',
                        'name' => 'label2',
                        'label' => 'Label 2',
                        'value' => '+150',
                        'width' => 6
                    ],
                    'parrafo2' => [
                        'type' => 'text_area',
                        'name' => 'parrafo2',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'label3' => [
                        'type' => 'text',
                        'name' => 'label3',
                        'label' => 'Label 3',
                        'value' => '+85',
                        'width' => 6
                    ],
                    'parrafo3' => [
                        'type' => 'text_area',
                        'name' => 'parrafo3',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ],
                    'label4' => [
                        'type' => 'text',
                        'name' => 'label4',
                        'label' => 'Label 4',
                        'value' => '+6k',
                        'width' => 6
                    ],
                    'parrafo4' => [
                        'type' => 'text_area',
                        'name' => 'parrafo4',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 6
                    ]
                ])
            ]);
        Block::create([
            'name'        => 'doctors',
            'title'       => 'Equipo Medico',
            'type'        => 'dinamyc-data',
            'description' => 'Equipo Medico',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => json_encode([
                    'title' => [
                        'type' => 'text',
                        'name' => 'title',
                        'label' => 'Titulo',
                        'value' => 'Lorem ipsum dolor sit amet',
                        'width' => 4
                    ],
                    'description_data' => [
                        'type' => 'rich_text_box',
                        'name' => 'description_data',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 8
                    ],
                    'space1' => [
                        'type'  => 'space',
                        'name'  => 'space1',
                    ],
                    'icon1' => [
                        'type' => 'text',
                        'name' => 'icon1',
                        'label' => 'Icon 1',
                        'value' => 'far fa-eye fa-2xt',
                        'width' => 4
                    ],
                    'name_short1' => [
                        'type' => 'text',
                        'name' => 'name_short1',
                        'label' => 'Nombre Corto',
                        'value' => 'Jhon',
                        'width' => 4
                    ],
                    'name_lang1' => [
                        'type' => 'text',
                        'name' => 'name_lang1',
                        'label' => 'Nombre Completo',
                        'value' => 'John Doe',
                        'width' => 4
                    ],
                ])
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

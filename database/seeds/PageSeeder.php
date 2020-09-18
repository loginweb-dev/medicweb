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
                        'width' => 3
                    ],
                    'name_short1' => [
                        'type' => 'text',
                        'name' => 'name_short1',
                        'label' => 'Nombre Corto',
                        'value' => 'Jhon',
                        'width' => 3
                    ],
                    'image1' => [
                        'type' => 'image',
                        'name' => 'image1',
                        'label' => 'Image 1 (354x471)',
                        'value' => 'image1.png',
                        'width' => 3
                    ],
                    'name_lang1' => [
                        'type' => 'text',
                        'name' => 'name_lang1',
                        'label' => 'Nombre Completo',
                        'value' => 'John Doe',
                        'width' => 3
                    ],
                    'description1' => [
                        'type' => 'rich_text_box',
                        'name' => 'description1',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 12
                    ],
                    'space2' => [
                        'type'  => 'space',
                        'name'  => 'space2',
                    ],
                    'icon2' => [
                        'type' => 'text',
                        'name' => 'icon2',
                        'label' => 'Icon 2',
                        'value' => 'fas fa-heartbeat fa-2x',
                        'width' => 3
                    ],
                    'name_short2' => [
                        'type' => 'text',
                        'name' => 'name_short2',
                        'label' => 'Nombre Corto',
                        'value' => 'Anna',
                        'width' => 3
                    ],
                    'image2' => [
                        'type' => 'image',
                        'name' => 'image2',
                        'label' => 'Image 2 (354x471)',
                        'value' => 'image2.png',
                        'width' => 3
                    ],
                    'name_lang2' => [
                        'type' => 'text',
                        'name' => 'name_lang2',
                        'label' => 'Nombre Completo',
                        'value' => 'Anna Moon',
                        'width' => 3
                    ],
                    'description2' => [
                        'type' => 'rich_text_box',
                        'name' => 'description2',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 12
                    ],
                    'space3' => [
                        'type'  => 'space',
                        'name'  => 'space3',
                    ],
                    'icon3' => [
                        'type' => 'text',
                        'name' => 'icon3',
                        'label' => 'Icon 3',
                        'value' => 'fas fa-search fa-2x',
                        'width' => 3
                    ],
                    'name_short3' => [
                        'type' => 'text',
                        'name' => 'name_short3',
                        'label' => 'Nombre Corto',
                        'value' => 'Maria',
                        'width' => 3
                    ],
                    'image3' => [
                        'type' => 'image',
                        'name' => 'image3',
                        'label' => 'Image 3 (354x471)',
                        'value' => 'image3.png',
                        'width' => 3
                    ],
                    'name_lang3' => [
                        'type' => 'text',
                        'name' => 'name_lang3',
                        'label' => 'Nombre Completo',
                        'value' => 'Maria Clark',
                        'width' => 3
                    ],
                    'description3' => [
                        'type' => 'rich_text_box',
                        'name' => 'description3',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 12
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
            'details'     => json_encode([
                    'title1' => [
                        'type' => 'text',
                        'name' => 'title1',
                        'label' => 'Titulo #1',
                        'value' => 'Basic',
                        'width' => 4
                    ],
                    'value1' => [
                        'type' => 'text',
                        'name' => 'value1',
                        'label' => 'Valor #1',
                        'value' => '10',
                        'width' => 4
                    ],
                    'checkbox1' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox1',
                        'label' => 'Opcion #1',
                        'value' => true,
                        'width' => 2
                    ],
                    'caracteristica1' => [
                        'type' => 'text',
                        'name' => 'caracteristica1',
                        'label' => 'Caracteristica',
                        'value' => '20 GB Of Storage',
                        'width' => 2
                    ],
                    'checkbox2' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox2',
                        'label' => 'Opcion #2',
                        'value' => true,
                        'width' => 1
                    ],
                    'caracteristica2' => [
                        'type' => 'text',
                        'name' => 'caracteristica2',
                        'label' => 'Caracteristica',
                        'value' => '2 Email Accounts',
                        'width' => 2
                    ],
                    'checkbox3' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox3',
                        'label' => 'Opcion #3',
                        'value' => false,
                        'width' => 1
                    ],
                    'caracteristica3' => [
                        'type' => 'text',
                        'name' => 'caracteristica3',
                        'label' => 'Caracteristica',
                        'value' => '24h Tech Support',
                        'width' => 2
                    ],
                    'checkbox4' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox4',
                        'label' => 'Opcion #4',
                        'value' => false,
                        'width' => 1
                    ],
                    'caracteristica4' => [
                        'type' => 'text',
                        'name' => 'caracteristica4',
                        'label' => 'Caracteristica',
                        'value' => '300 GB Bandwidth',
                        'width' => 2
                    ],
                    'checkbox5' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox5',
                        'label' => 'Opc #5',
                        'value' => false,
                        'width' => 1
                    ],
                    'caracteristica5' => [
                        'type' => 'text',
                        'name' => 'caracteristica5',
                        'label' => 'Caracteristica',
                        'value' => 'User Management',
                        'width' => 2
                    ],
                    'space' => [
                        'type'  => 'space',
                        'name'  => 'space',
                    ],
                    'title_b' => [
                        'type' => 'text',
                        'name' => 'title_b',
                        'label' => 'Titulo #1',
                        'value' => 'Pro',
                        'width' => 4
                    ],
                    'value_b' => [
                        'type' => 'text',
                        'name' => 'value_b',
                        'label' => 'Valor #2',
                        'value' => '20',
                        'width' => 4
                    ],
                    'checkbox_b1' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_b1',
                        'label' => 'Opcion #1',
                        'value' => true,
                        'width' => 2
                    ],
                    'caracteristica_b1' => [
                        'type' => 'text',
                        'name' => 'caracteristica_b1',
                        'label' => 'Caracteristica',
                        'value' => '20 GB Of Storage',
                        'width' => 2
                    ],
                    'checkbox_b2' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_b2',
                        'label' => 'Opcion #2',
                        'value' => true,
                        'width' => 1
                    ],
                    'caracteristica_b2' => [
                        'type' => 'text',
                        'name' => 'caracteristica_b2',
                        'label' => 'Caracteristica',
                        'value' => '2 Email Accounts',
                        'width' => 2
                    ],
                    'checkbox_b3' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_b3',
                        'label' => 'Opcion #3',
                        'value' => true,
                        'width' => 1
                    ],
                    'caracteristica_b3' => [
                        'type' => 'text',
                        'name' => 'caracteristica_b3',
                        'label' => 'Caracteristica',
                        'value' => '24h Tech Support',
                        'width' => 2
                    ],
                    'checkbox_b4' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_b4',
                        'label' => 'Opcion #4',
                        'value' => false,
                        'width' => 1
                    ],
                    'caracteristica_b4' => [
                        'type' => 'text',
                        'name' => 'caracteristica_b4',
                        'label' => 'Caracteristica',
                        'value' => '300 GB Bandwidth',
                        'width' => 2
                    ],
                    'checkbox_b5' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_b5',
                        'label' => 'Opc #5',
                        'value' => false,
                        'width' => 1
                    ],
                    'caracteristica_b5' => [
                        'type' => 'text',
                        'name' => 'caracteristica_b5',
                        'label' => 'Caracteristica',
                        'value' => 'User Management',
                        'width' => 2
                    ],
                    'space4' => [
                        'type'  => 'space',
                        'name'  => 'space',
                    ],
                    'title_c' => [
                        'type' => 'text',
                        'name' => 'title_c',
                        'label' => 'Titulo #1',
                        'value' => 'Enterprise',
                        'width' => 4
                    ],
                    'value_c' => [
                        'type' => 'text',
                        'name' => 'value_c',
                        'label' => 'Valor #2',
                        'value' => '30',
                        'width' => 4
                    ],
                    'checkbox_c1' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_c1',
                        'label' => 'Opcion #1',
                        'value' => true,
                        'width' => 2
                    ],
                    'caracteristica_c1' => [
                        'type' => 'text',
                        'name' => 'caracteristica_c1',
                        'label' => 'Caracteristica',
                        'value' => '20 GB Of Storage',
                        'width' => 2
                    ],
                    'checkbox_c2' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_c2',
                        'label' => 'Opcion #2',
                        'value' => true,
                        'width' => 1
                    ],
                    'caracteristica_c2' => [
                        'type' => 'text',
                        'name' => 'caracteristica_c2',
                        'label' => 'Caracteristica',
                        'value' => '2 Email Accounts',
                        'width' => 2
                    ],
                    'checkbox_c3' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_c3',
                        'label' => 'Opcion #3',
                        'value' => true,
                        'width' => 1
                    ],
                    'caracteristica_c3' => [
                        'type' => 'text',
                        'name' => 'caracteristica_c3',
                        'label' => 'Caracteristica',
                        'value' => '24h Tech Support',
                        'width' => 2
                    ],
                    'checkbox_c4' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_c4',
                        'label' => 'Opcion #4',
                        'value' => true,
                        'width' => 1
                    ],
                    'caracteristica_c4' => [
                        'type' => 'text',
                        'name' => 'caracteristica_c4',
                        'label' => 'Caracteristica',
                        'value' => '300 GB Bandwidth',
                        'width' => 2
                    ],
                    'checkbox_c5' => [
                        'type' => 'checkbox',
                        'name' => 'checkbox_c5',
                        'label' => 'Opc #5',
                        'value' => true,
                        'width' => 1
                    ],
                    'caracteristica_c5' => [
                        'type' => 'text',
                        'name' => 'caracteristica_c5',
                        'label' => 'Caracteristica',
                        'value' => 'User Management',
                        'width' => 2
                    ],
                ])
            ]);
        Block::create([
            'name'        => 'testimonials',
            'title'       => 'Testimonio de Clientes',
            'type'        => 'dinamyc-data',
            'description' => 'Testimonios de Clientes',
            'page_id'     => $page->id,
            'position'    => $count++,
            'details'     => json_encode([
                    'nombre' => [
                        'type' => 'text',
                        'name' => 'nombre',
                        'label' => 'Nombre Completo',
                        'value' => 'Augusto Carvalho Chavez',
                        'width' => 6
                    ],
                    'image' => [
                        'type' => 'image',
                        'name' => 'image',
                        'label' => 'Imagen (250x250)',
                        'value' => null,
                        'width' => 6
                    ],
                    'parrafo' => [
                        'type' => 'rich_text_box',
                        'name' => 'parrafo',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 12
                    ],
                    'space'=> [
                        'type'=> 'space',
                        'name' => 'space'
                    ],
                    'nombre1' => [
                        'type' => 'text',
                        'name' => 'nombre1',
                        'label' => 'Nombre Completo',
                        'value' => 'Mirian Hernandez Gonzales',
                        'width' => 6
                    ],
                    'image1' => [
                        'type' => 'image',
                        'name' => 'image1',
                        'label' => 'Imagen (250x250)',
                        'value' => null,
                        'width' => 6
                    ],
                    'parrafo1' => [
                        'type' => 'rich_text_box',
                        'name' => 'parrafo1',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 12
                    ],
                    'space1'=> [
                        'type'=> 'space',
                        'name' => 'space1'
                    ],
                    'nombre2' => [
                        'type' => 'text',
                        'name' => 'nombre2',
                        'label' => 'Nombre Completo',
                        'value' => 'Marcelo gutierrez',
                        'width' => 6
                    ],
                    'image2' => [
                        'type' => 'image',
                        'name' => 'image2',
                        'label' => 'Imagen (250x250)',
                        'value' => null,
                        'width' => 6
                    ],
                    'parrafo2' => [
                        'type' => 'rich_text_box',
                        'name' => 'parrafo2',
                        'label' => 'Descripcion',
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.',
                        'width' => 12
                    ],
                    'space2'=> [
                        'type'=> 'space',
                        'name' => 'space2'
                    ]
                ])
            ]);
    
    
        $page = Page::create([
            'name'        =>  'Politicas & Privacidad',
            'slug'        =>  'policies',
            'user_id'     =>  1,
            'direction'   =>  'pages.generica',
            'description' =>  'Pagina para las politicas & seguridad'
        ]);
        $count = 1;
        Block::create([
            'name'        => 'body',
            'title'       => 'Blocke Generico',
            'description' => 'Blocke Generico para Paginas',
            'page_id'     => $page->id,
            'position'    => $count++,
            'type'        => 'dinamyc-data',
            'details'     => json_encode([
                'body' => [
                    'type'   => 'rich_text_box',
                    'name'   => 'body',
                    'label'  => 'Editor HTML',
                    'value'  => null,
                    'width'  => 12
                ]
            ])
        ]);
        
        $page = Page::create([
            'name'        =>  'Terminos & Condiones',
            'slug'        =>  'terms',
            'user_id'     =>  1,
            'direction'   =>  'pages.generica',
            'description' =>  'Pagina para los terminos y condiciones'
        ]);
        $count = 1;
        Block::create([
            'name'        => 'body',
            'title'       => 'Blocke Generico',
            'description' => 'Blocke Generico para Paginas',
            'page_id'     => $page->id,
            'position'    => $count++,
            'type'        => 'dinamyc-data',
            'details'     => json_encode([
                'body' => [
                    'type'   => 'rich_text_box',
                    'name'   => 'body',
                    'label'  => 'Editor HTML',
                    'value'  => null,
                    'width'  => 12
                ]
            ])
        ]);
    }
}

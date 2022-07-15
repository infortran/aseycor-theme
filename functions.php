<?php 

function aseycor_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('aseycor-style', get_template_directory_uri() . "/style.css", array('aseycor-swiper'), $version, 'all');
    wp_enqueue_style('aseycor-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css", array(), '6.1.1', 'all');
    wp_enqueue_style('aseycor-swiper', "https://unpkg.com/swiper@8/swiper-bundle.min.css", array(), '8.0', 'all');
}

add_action('wp_enqueue_scripts', 'aseycor_register_styles');

function aseycor_register_scripts(){
    wp_enqueue_script( 'aseycor-swiper', "https://unpkg.com/swiper@8/swiper-bundle.min.js", array(), '8.0', true );
    wp_enqueue_script( 'aseycor-app', get_template_directory_uri() . "/assets/js/app.js", array('aseycor-swiper'), '0.1',true );
}

add_action( 'wp_enqueue_scripts', 'aseycor_register_scripts' );

// Register Custom Post Type
function propiedades_post() {

	$labels = array(
		'name'                  => _x( 'Propiedades', 'Post Type General Name', 'aseycor_post' ),
		'singular_name'         => _x( 'Propiedad', 'Post Type Singular Name', 'aseycor_post' ),
		'menu_name'             => __( 'Propiedades', 'aseycor_post' ),
		'name_admin_bar'        => __( 'Propiedades', 'aseycor_post' ),
		'archives'              => __( 'Archivos de la propiedad', 'aseycor_post' ),
		'attributes'            => __( 'Atributos de la propiedad', 'aseycor_post' ),
		'parent_item_colon'     => __( 'Padre de la propiedad', 'aseycor_post' ),
		'all_items'             => __( 'Todas las propiedades', 'aseycor_post' ),
		'add_new_item'          => __( 'Agregar nueva propiedad', 'aseycor_post' ),
		'add_new'               => __( 'Nueva', 'aseycor_post' ),
		'new_item'              => __( 'Nueva propiedad', 'aseycor_post' ),
		'edit_item'             => __( 'Editar propiedad', 'aseycor_post' ),
		'update_item'           => __( 'Actualizar propiedad', 'aseycor_post' ),
		'view_item'             => __( 'Ver propiedad', 'aseycor_post' ),
		'view_items'            => __( 'Ver propiedades', 'aseycor_post' ),
		'search_items'          => __( 'Buscar propiedades', 'aseycor_post' ),
		'not_found'             => __( 'Propiedad no encontrada', 'aseycor_post' ),
		'not_found_in_trash'    => __( 'No encontrada en la basura', 'aseycor_post' ),
		'featured_image'        => __( 'Imagen', 'aseycor_post' ),
		'set_featured_image'    => __( 'Fijar imagen', 'aseycor_post' ),
		'remove_featured_image' => __( 'Remover imagen', 'aseycor_post' ),
		'use_featured_image'    => __( 'Usar como imagen', 'aseycor_post' ),
		'insert_into_item'      => __( 'Insertar dentro de la propiedad', 'aseycor_post' ),
		'uploaded_to_this_item' => __( 'Cargado a esta propiedad', 'aseycor_post' ),
		'items_list'            => __( 'Lista de propiedades', 'aseycor_post' ),
		'items_list_navigation' => __( 'Lista de navegacion de propiedades', 'aseycor_post' ),
		'filter_items_list'     => __( 'Filtrar lista de propiedades', 'aseycor_post' ),
	);
	$args = array(
		'label'                 => __( 'Propiedad', 'aseycor_post' ),
		'description'           => __( 'Propiedades en venta o en arriendo', 'aseycor_post' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'propiedades', $args );

}
add_action( 'init', 'propiedades_post', 0 );

add_action('wp_head', 'my_wp_head');
function my_wp_head(){
    echo '<style>'
    .PHP_EOL
    .'body{ padding-top: 70px !important; }'
    .PHP_EOL
    .'body.body-logged-in .navbar-fixed-top{ top: 46px !important; }'
    .PHP_EOL
    .'body.logged-in .navbar-fixed-top{ top: 46px !important; }'
    .PHP_EOL
    .'@media only screen and (min-width: 783px) {'
    .PHP_EOL
    .'body{ padding-top: 70px !important; }'
    .PHP_EOL
    .'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }'
    .PHP_EOL
    .'body.logged-in .navbar-fixed-top{ top: 28px !important; }'
    .PHP_EOL
    .'}</style>'
    .PHP_EOL;
}

// Register Custom Post Type
function slider_home() {

	$labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Sliders', 'text_domain' ),
		'name_admin_bar'        => __( 'Sliders', 'text_domain' ),
		'archives'              => __( 'Archivos del Slider', 'text_domain' ),
		'attributes'            => __( 'Atributos del Slider', 'text_domain' ),
		'parent_item_colon'     => __( 'Slider Padre:', 'text_domain' ),
		'all_items'             => __( 'Todos los Sliders', 'text_domain' ),
		'add_new_item'          => __( 'Agregar nuevo Slider', 'text_domain' ),
		'add_new'               => __( 'Agregar Nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Slider', 'text_domain' ),
		'edit_item'             => __( 'Editar Slider', 'text_domain' ),
		'update_item'           => __( 'Actualizar Slider', 'text_domain' ),
		'view_item'             => __( 'Ver Slider', 'text_domain' ),
		'view_items'            => __( 'Ver Sliders', 'text_domain' ),
		'search_items'          => __( 'Buscar Slider', 'text_domain' ),
		'not_found'             => __( 'Slider no encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Slider no encontrado en la papelera', 'text_domain' ),
		'featured_image'        => __( 'Imagen', 'text_domain' ),
		'set_featured_image'    => __( 'Fijar Imagen', 'text_domain' ),
		'remove_featured_image' => __( 'Remover Imagen', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como Imagen', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en Slider', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido al Slider', 'text_domain' ),
		'items_list'            => __( 'Lista de Sliders', 'text_domain' ),
		'items_list_navigation' => __( 'Lista de navegación', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar lista de Sliders', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Slider', 'text_domain' ),
		'description'           => __( 'Slider Principal del Home', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'slider_home', $args );

}
add_action( 'init', 'slider_home', 0 );
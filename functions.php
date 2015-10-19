<?php


//Dequeue bootstrap CSS and load in proper order
add_action( 'wp_enqueue_scripts', 'my_dequeue_styles', 11 );

function my_dequeue_styles() {
    wp_dequeue_style( 'bootville-lite-bootstrap-styles' );
}
// add child theme text domain
add_action( 'after_setup_theme', 'indingo_bootville_lite_theme_setup' );
function indingo_bootville_lite_theme_setup() {
    load_child_theme_textdomain( 'indingo-bootville-lite', get_stylesheet_directory() . '/languages' );
}

//Import parent styles add other stylesheets.
function indigo_bootville_lite_enqueue_parent_styles() {
	
	// load bootstrap CSS first
	wp_enqueue_style( 'indingo-bootville-lite-parent-bootstrap-style', get_template_directory_uri().'/css/bootstrap.min.css' );
	
	// load parent theme CSS
	wp_enqueue_style( 'indingo-bootville-lite-parent-style', get_template_directory_uri().'/style.css' );
	
	// load child theme CSS last
	wp_enqueue_style( 'indigo-bootville-lite-child-style', get_stylesheet_uri(),11 );
	
	// register google fonts
	wp_register_style('indigo-bootville-lite-google-fonts', 'http://fonts.googleapis.com/css?family=Montserrat:200|Open+Sans', array(), false, 'all');

	// enqueue google fonts
	wp_enqueue_style('indigo-bootville-lite-google-fonts');
	
	// load back to top JS
	wp_enqueue_script( 'indingo-bootville-lite-main-js', get_stylesheet_directory_uri() . '/js/toplink.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'indigo_bootville_lite_enqueue_parent_styles' );

	// Jumbotron featured image
add_image_size( 'jumbotron-image', 400, 9999 );

function indigo_bootville_lite_widgets_init() {

	// Jumbotron widgets first row
	register_sidebar(array(
		'name'          => __( 'Jumbotron 1', 'bootville-lite' ),
		'id'            => 'jumbotron-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div><div class="panel-body">',
	) );

	register_sidebar(array(
		'name'          => __( 'Jumbotron 2', 'bootville-lite' ),
		'id'            => 'jumbotron-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div><div class="panel-body">',
	) );

	register_sidebar(array(
		'name'          => __( 'Jumbotron 3', 'bootville-lite' ),
		'id'            => 'jumbotron-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div><div class="panel-body">',
	) );


	// Jumbotron widgets second row
	register_sidebar(array(
		'name'          => __( 'Jumbotron 4', 'bootville-lite' ),
		'id'            => 'jumbotron-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div><div class="panel-body">',
	) );

	register_sidebar(array(
		'name'          => __( 'Jumbotron 5', 'bootville-lite' ),
		'id'            => 'jumbotron-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div><div class="panel-body">',
	) );

	register_sidebar(array(
		'name'          => __( 'Jumbotron 6', 'bootville-lite' ),
		'id'            => 'jumbotron-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div><div class="panel-body">',
	) );	
	
	
}
add_action( 'widgets_init', 'indigo_bootville_lite_widgets_init', 11 );

// Theme Customizer
require get_stylesheet_directory() . '/inc/theme-customizer.php';

// Pagination
function bootville_lite_get_posts_pagination( $args = '' ) {
  global $wp_query;
  $pagination = '';

  if ( $GLOBALS['wp_query']->max_num_pages > 1 ) :

    $defaults = [
      'total'     => isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1,
      'current'   => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
      'type'      => 'array',
      'prev_text' => '&laquo;',
      'next_text' => '&raquo;',
    ];

    $params = wp_parse_args( $args, $defaults );

    $paginate = paginate_links( $params );

    if( $paginate ) :
      $pagination .= "<ul class='pagination'>";
      foreach( $paginate as $page ) :
        if( strpos( $page, 'current' ) ) :
          $pagination .= "<li class='active'>$page</li>";
        else :
          $pagination .= "<li>$page</li>";
        endif;
      endforeach;
      $pagination .= "</ul>";
    endif;

  endif;

  return $pagination;
}


function bootville_lite_the_posts_pagination( $args = '' ) {
  echo bootville_lite_get_posts_pagination( $args );
}
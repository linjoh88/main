<?php
/**
 * Superlist child functions and definitions
 *
 * @package Superlist Child
 * @since Superlist Child 1.0.0
 */


function wpb_add_google_fonts() {
 
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i|Playfair+Display:400,400i,700,700i,900,900i', false ); 
}
 
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );
 
function superlist_child_enqueue_files() {
    # Remove original style
    # wp_dequeue_style( 'superlist' );

    # Register style for custom appearance
    wp_register_style( 'superlist-custom', get_stylesheet_directory_uri() . '/superlist-custom.css' );

    # Include new styles
	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' );
	wp_enqueue_style( 'superlist-custom' );
}

add_action( 'wp_enqueue_scripts', 'superlist_child_enqueue_files', 99 );

function theme_js() {

	global $wp_scripts;

	wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
	# wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');

}

add_action( 'wp_enqueue_scripts', 'theme_js');

add_image_size( 'single-post-thumbnail', 1140, 656 );

function change_the_header($url_for_image) {
    if (is_home()) 
        $url_for_image = 'http://localhost:81/v6/wp-content/uploads/2018/08/logo_grön.png';

    return $url_for_image;
}
add_filter('theme_mod_header_image', 'change_the_header');
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


   
}

add_action( 'wp_enqueue_scripts', 'superlist_child_enqueue_files', 99 );



<?php

/*** Child Theme Function  ***/

/*** Custom Widgets ***/

include_once 'widgets/top-menu.php';
include_once 'widgets/custom-search.php';

// Custom JavaScript
function uwo_theme_enqueue_script(){
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/script.js', array('jquery') ,'1.0', true );
}
add_action( 'wp_enqueue_scripts', 'uwo_theme_enqueue_script' );

/*** Scripts ***/

function eltd_child_theme_enqueue_scripts() {
	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
	wp_enqueue_style( 'childstyle' );
}
add_action('wp_enqueue_scripts', 'eltd_child_theme_enqueue_scripts', 11);

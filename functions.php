<?php

/* load up stylesheets in proper order*/
function cortex_enqueue_child_styles() {

	//grab theme options
	$cortex_theme_options = global $cortex_options;

    //queue up the child stylesheet after the dark/light theme style
	if ( $cortex_theme_options['c9-theme-style'] == 'light' ) {

    	wp_enqueue_style( 'cortex-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cortex-style-light' ) );

    } else {

    	wp_enqueue_style( 'cortex-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cortex-style-dark' ) );

    }

    add_editor_style( get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'cortex_enqueue_child_styles', 25 );
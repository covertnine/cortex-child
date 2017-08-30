<?php

/* load up stylesheets in proper order*/
function cortex_enqueue_child_styles() {

	//grab theme options
	global $cortex_options;

    //queue up the child stylesheet after the dark/light theme style
	if ( $cortex_options['c9-theme-style'] == 'light' ) {

    	wp_enqueue_style( 'cortex-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cortex-style-colors' ) );

    } else {

    	wp_enqueue_style( 'cortex-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cortex-style-colors' ) );

    }

}
add_action( 'wp_enqueue_scripts', 'cortex_enqueue_child_styles', 100 );

/* add child style to editor */
function cortex_child_editor_style() {
	add_editor_style( get_template_directory_uri() . '/style.css' );
	add_editor_style( get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'admin_init', 'cortex_child_editor_style', 45 );

//define( 'ACF_LITE' , true );

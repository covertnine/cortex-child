<?php
function cortex_scripts_cgg() {
	wp_dequeue_script( 'cortex-js' );
	wp_enqueue_script( 'cortex-cgg-js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '', true );
    wp_enqueue_script( 'cgg-js', get_stylesheet_directory_uri() . '/js/cgg.js', array('jquery'), '', true );

}
add_action( 'wp_print_scripts', 'cortex_scripts_cgg', 99 );

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


if ( ! function_exists( 'cortex_acf_field_sanitization' ) ) {
    function cortex_acf_field_sanitization( $value, $post_id, $field ) {

        if ( ( $field['_name'] != 'custom_code' ) && ( $field['_name'] != 'custom_js' ) && ( $field['_name'] != 'content') ) {

            // santize data from custom fields
            $value = wp_kses_post( balanceTags($value) );
            return $value;

        }
        return $value;

    }
}
add_filter('acf/format_value', 'cortex_acf_field_sanitization', 10, 3 );

define( 'ACF_LITE' , false );

include('inc/post-types.php');

//add additional custom fields like the welcome window
include('inc/additional-options.php');

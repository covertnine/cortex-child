<?php

/* load up stylesheets in proper order*/
function cortex_enqueue_child_styles() {

	//grab theme options
	global $cortex_options;

    //queue up the child stylesheet after the dark/light theme style
	if ( $cortex_options['c9-theme-style'] == 'light' ) {

		//wp_deregister_script('cortex-js');
		wp_deregister_style('yarppWidgetCss');
		wp_enqueue_script( 'riot-js', get_stylesheet_directory_uri() . '/js/riotfest.js', 'jquery', '20170418', true );
    	wp_enqueue_style( 'cortex-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cortex-style-light' ) );

    } else {

    	wp_enqueue_style( 'cortex-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cortex-style-dark' ) );

    }

    add_editor_style( get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'cortex_enqueue_child_styles', 35 );

function cortex_deregister_styles() {

	wp_deregister_style('yarppRelatedCss-css');
	wp_dequeue_style('yarppRelatedCss-css');
	wp_deregister_style('yarppRelatedCss');
	wp_dequeue_style('yarppRelatedCss');

}
add_action('wp_enqueue_styles', 'cortex_deregister_styles', 999);

/* add child style to editor */
function cortex_child_editor_style() {
   add_editor_style( get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'init', 'cortex_child_editor_style' );


//adds custom formats to TinyMCE
include('inc/formats-menu.php');

//adds shortcode for tracking sales
include('inc/shortcodes.php');

//add additional custom fields like the welcome window
include('inc/additional-options.php');

//add author image field
include('inc/author-fields.php');


//add dashboard widget for content calendar
add_action( 'wp_dashboard_setup', 'riot_dashboard_widget' );
function riot_dashboard_widget() {
	wp_add_dashboard_widget(
		'riot_dashboard_widget',
		'Riot Fest Website',
		'riot_dashboard_widget_display'
	);

}

function riot_dashboard_widget_display() {

    echo '<h1><a href="/wp-admin/edit.php?page=cal">Content Calendar</a></h1>';
    echo '<h3><a href="/wp-admin/admin.php?page=cortex-options&tab=15">Enable/Disable Welcome Window</a></h3>';
    echo '<h3><a href="/wp-admin/post.php?post=33201&action=edit">Edit Welcome Window</a></h3>';
    echo '<h3><a href="/wp-admin/admin.php?page=cortex-options&tab=5">Change Site Background</a></h3>';
    echo '<h3><a href="/wp-admin/media-new.php">Upload Large Files</a></h3>';


}

//define("ACF_LITE", false);
<?php
if ( ! function_exists( 'cortex_scripts' ) ) {
    function cortex_scripts() {

        global $cortex_options;

        // grab theme options
        $cortex_theme_options   = $cortex_options;

        // check for rtl support include regular bootstrap by default
        if ( $cortex_theme_options['c9-rtl-support'] === true ) {
            wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/css/bootstrap.rtl.min.css' );
        } else {
            wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
        }

        // queue stylesheets, font-specific styles, & custom CSS into header (fonts css loaded individually and ajax google fonts loaded later by javascript in main.js)
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
        wp_enqueue_style( 'jquery-flexslider', get_template_directory_uri() . '/css/flexslider.css' );
        wp_enqueue_style( 'cortex-style', get_template_directory_uri() . '/style.css' );

        // queue animation CSS if enabled
        if ( $cortex_theme_options['c9-animation'] == true ) {
            wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array(), '', true );
            wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css' );
        }

        // queue light or dark style
        if ( $cortex_theme_options['c9-theme-style'] == 'light' ) {
            wp_enqueue_style( 'cortex-style-light', get_template_directory_uri() . '/css/style-light.css', array( 'cortex-style' ) );
            add_editor_style( get_template_directory_uri() . '/css/style-light.css' );

        } else { //dark style

            wp_enqueue_style( 'cortex-style-dark', get_template_directory_uri() . '/css/style-dark.css', array( 'cortex-style' ) );
            add_editor_style( get_template_directory_uri() . '/css/style-dark.css' );

        }

        // check for rtl support include rtl css
        if ( $cortex_theme_options['c9-rtl-support'] == true ) {
            wp_enqueue_style( 'cortex-rtl', get_template_directory_uri() . '/rtl.css', array( 'cortex-style' ) );
            add_editor_style( get_template_directory_uri() . '/rtl.css' );
        }

        // add user typography CSS style based on theme options, or use a default
        $css_file = cortex_get_css_path();
        if (file_exists($css_file)) { //user generated css

            /* bulid the proper url */
            $upload_url     = content_url() . '/uploads/';
            $theme          = wp_get_theme();
            $theme_name     = strtolower( $theme->get( 'Name' ) );

            wp_enqueue_style ( 'cortex-typography', $upload_url . $theme_name . '/typography.css', array( 'cortex-style' ) );

        } else { //default css

            // enqueue the default file included with your theme.
            wp_enqueue_style ( 'cortex-typography', get_template_directory_uri() . '/css/typography.css', array ( 'cortex-style' ) );

        }

        // queue JS
        wp_enqueue_script( 'flexslider-js', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', array(), '', true );
        wp_enqueue_script( 'cortex-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
        wp_enqueue_script( 'boostrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
        wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '', true );
        wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '', true );
        wp_enqueue_script( 'magnific-js', get_template_directory_uri() . '/js/magnific.js', array(), '', true );
        wp_enqueue_script( 'skrollr-js', get_template_directory_uri() . '/js/skrollr.min.js', array(), '', true );
        wp_enqueue_script( 'classie-js', get_template_directory_uri() . '/js/classie.js', array(), '', true );
        wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/js/modernizr.min.js', array(), '', true );
        wp_enqueue_script( 'cortex-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '', true );
        wp_enqueue_script( 'cgg-js', get_stylesheet_directory_uri() . '/js/cgg.js', array(), '', true );
        wp_enqueue_script( 'skrollr-init-js', get_template_directory_uri() . '/js/skrollr-init.js', array(), '', true );
        // wp_dequeue_style('megamenu');

        // add required comment reply js
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'cortex_scripts', 30 );

/* load up stylesheets in proper order*/
function cortex_enqueue_child_styles() {

    //grab theme options
    global $cortex_options;

    //queue up the child stylesheet after the dark/light theme style
    if ( $cortex_options['c9-theme-style'] == 'light' ) {

        wp_enqueue_style( 'cortex-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cortex-style-light' ) );

    } else {

        wp_enqueue_style( 'cortex-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'cortex-style-dark' ) );
        
    }

    add_editor_style( get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'cortex_enqueue_child_styles', 35 );

/* add child style to editor */
function cortex_child_editor_style() {
   add_editor_style( get_stylesheet_directory_uri() . '/style.css' );
}
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

add_action( 'init', 'cortex_child_editor_style' );

add_action( 'init', 'cortex_child_editor_style' );

include('inc/post-types.php');

//add additional custom fields like the welcome window
include('inc/additional-options.php');

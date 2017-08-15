<?php
function cortex_cgg_post_types() {


		$labels = array(
			"name" => "Gardens",
			"singular_name" => "garden",
			);

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => true,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'supports' => array('title', 'page-attributes', 'revisions', 'thumbnail', 'editor', 'excerpt'),
			"rewrite" => array( "slug" => "garden", "with_front" => true ),
			"query_var" => true,
			'taxonomies' => array( 'category', 'post_tag' ),
		);

		register_post_type( "garden", $args );


		//gardens region
		$gardenlabels = array(
			'name'                       => __( 'Regions', 'cortex-post-types' ),
			'singular_name'              => __( 'Region', 'cortex-post-types' ),
			'menu_name'                  => __( 'Regions', 'cortex-post-types' ),
			'edit_item'                  => __( 'Edit Region', 'cortex-post-types' ),
			'update_item'                => __( 'Update Region', 'cortex-post-types' ),
			'add_new_item'               => __( 'Add New Region', 'cortex-post-types' ),
			'new_item_name'              => __( 'New Region Name', 'cortex-post-types' ),
			'parent_item'                => __( 'Parent Region', 'cortex-post-types' ),
			'parent_item_colon'          => __( 'Parent Region:', 'cortex-post-types' ),
			'all_items'                  => __( 'All Regions', 'cortex-post-types' ),
			'search_items'               => __( 'Search Regions', 'cortex-post-types' ),
			'popular_items'              => __( 'Popular Regions', 'cortex-post-types' ),
			'separate_items_with_commas' => __( 'Separate Regions with commas', 'cortex-post-types' ),
			'add_or_remove_items'        => __( 'Add or remove Regions', 'cortex-post-types' ),
			'choose_from_most_used'      => __( 'Choose from the most used Regions', 'cortex-post-types' ),
			'not_found'                  => __( 'No Regions found.', 'cortex-post-types' ),
		);

		$gardenargs = array(
			'labels'            => $gardenlabels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'gardens-region' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$gardenargs = apply_filters( 'cortex_garden_region_args', $gardenargs );

		register_taxonomy('gardens_region', 'garden', $gardenargs );


		$labels = array(
			"name" => "Sponsors",
			"singular_name" => "sponsor",
			);

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => true,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'supports' => array('title', 'page-attributes', 'revisions', 'thumbnail', 'excerpt'),
			"rewrite" => array( "slug" => "sponsor", "with_front" => false ),
			"query_var" => true,
			'taxonomies' => array( 'category', 'post_tag' )
										);
		register_post_type( "sponsor", $args );

}
flush_rewrite_rules( $hard );
add_action( 'init', 'cortex_cgg_post_types');
flush_rewrite_rules( $hard );
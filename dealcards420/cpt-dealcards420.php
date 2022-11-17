<?php
/* Custom Post type start */

namespace sparkd;

if ( ! function_exists( 'post_type_deals420card' ) ) {
	function post_type_deals420card() {

		$supports = array(
			'title', // post title
			'thumbnail', // featured images
			'post-formats', // post formats
		);

		$labels = array(
		'name' => _x( 'deals420cards', 'plural' ),
		'singular_name' => _x( 'deal420card', 'singular' ),
		'menu_name' => _x( 'Deal 420 Card', 'admin menu' ),
		'name_admin_bar' => _x( 'Deal 420 Cards', 'admin bar' ),
		'add_new' => _x( 'Add New', 'add new' ),
		'add_new_item' => __( 'Add New Deal 420 Card' ),
		'new_item' => __( 'New Deal 420 Cards' ),
		'edit_item' => __( 'Edit Deal 420 Cards' ),
		'view_item' => __( 'View Deal 420 Cards' ),
		'all_items' => __( 'All Deal 420 Cards' ),
		'search_items' => __( 'Search Deal 420 Cards' ),
		'not_found' => __( 'No Deal 420 Cards found.' ),	
		);

		$args = array(
			'supports' => $supports,
			'labels' => $labels,
			'public' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'deal420cards' ),
			'has_archive' => true,
			'hierarchical' => false,
			'no_found_rows' => true,
			'update_post_meta_cache' => false, 
			'update_post_term_cache' => false, 
			'menu_icon' => 'dashicons-money',
		);

		register_post_type( 'deals420cards', $args );
	}
}
/* Custom Post type end */

add_action( 'init', '\sparkd\post_type_deals420card' );

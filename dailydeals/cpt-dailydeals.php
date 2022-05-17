<?php
/* Custom Post Type start */

function post_type_dailydeals() {

	$supports = array(
		'title', // post title
		'thumbnail', // featured images
		'post-formats', // post formats
	);

	$labels = array(
	'name' => _x( 'dailydeals', 'plural' ),
	'singular_name' => _x( 'dailydeal', 'singular' ),
	'menu_name' => _x( 'Daily Deals', 'admin menu' ),
	'name_admin_bar' => _x( 'Daily Deals', 'admin bar' ),
	'add_new' => _x( 'Add New', 'add new' ),
	'add_new_item' => __( 'Add New Daily Deal' ),
	'new_item' => __( 'New Daily Deal' ),
	'edit_item' => __( 'Edit Daily Deals' ),
	'view_item' => __( 'View Daily Deals' ),
	'all_items' => __( 'All Daily Deals' ),
	'search_items' => __( 'Search Daily Deals' ),
	'not_found' => __( 'No Daily Deals found.' ),	
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'dailydeals' ),
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-money',
	);

	register_post_type( 'dailydeals', $args );
}
/* Custom Post type end */

add_action( 'init', 'post_type_dailydeals' );

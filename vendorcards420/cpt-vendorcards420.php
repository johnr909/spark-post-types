<?php
/* Custom Post type start */

function post_type_vendor420cards() {

	$supports = array(
		'title', // post title
		'thumbnail', // featured images
		'post-formats', // post formats
	);

	$labels = array(
	'name' => _x('vendor420cards', 'plural'),
	'singular_name' => _x('vendor420card', 'singular'),
	'menu_name' => _x('Vendor 420 Card', 'admin menu'),
	'name_admin_bar' => _x('Vendor 420 Cards', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New Vendor 420 Card'),
	'new_item' => __('New Vendor 420 Cards'),
	'edit_item' => __('Edit Vendor 420 Cards'),
	'view_item' => __('View Vendor 420 Cards'),
	'all_items' => __('All Vendor 420 Cards'),
	'search_items' => __('Search Vendor 420 Cards'),
	'not_found' => __('No Vendor 420 Cards found.'),	
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'vendor420cards'),
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-store',
	);

	register_post_type('vendor420cards', $args);
}
/* Custom Post type end */

add_action('init', 'post_type_vendor420cards');

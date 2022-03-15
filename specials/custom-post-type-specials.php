<?php
/*Custom Post type start*/

function post_type_specials() {

	$supports = array(
		'title', // post title
		'author', // post author
		'thumbnail', // featured images
		'custom-fields', // custom fields
		'revisions', // post revisions
		'post-formats', // post formats
	);

	$labels = array(
	'name' => _x('specials', 'plural'),
	'singular_name' => _x('special', 'singular'),
	'menu_name' => _x('Specials', 'admin menu'),
	'name_admin_bar' => _x('Specials', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New Special'),
	'new_item' => __('New Specials'),
	'edit_item' => __('Edit Specials'),
	'view_item' => __('View Specials'),
	'all_items' => __('All Specials'),
	'search_items' => __('Search Specials'),
	'not_found' => __('No Specials found.'),	
	'menu_icon'   => 'dashicons-products',
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'specials'),
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-money-alt',
	);

	register_post_type('specials', $args);
}
/*Custom Post type end*/

add_action('init', 'post_type_specials');

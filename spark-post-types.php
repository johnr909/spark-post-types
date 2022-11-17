<?php
/**
 * Plugin Name:     Spark Post Types
 * Description:     The home of Custom Post Types and associated fields/data for Spark.
 * Author:          johnr909
 * Author URI:      https://sparkdispensary.com
 * Text Domain:     spark-post-types
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Spark_Post_Types
 */

$dir = plugin_dir_path( __DIR__ );
require $dir . '/spark-post-types/reviews/cpt-reviews.php';
require $dir . '/spark-post-types/reviews/custom-metabox-reviews.php';

require $dir . '/spark-post-types/specials/cpt-specials.php';
require $dir . '/spark-post-types/specials/custom-metabox-specials.php';
require $dir . '/spark-post-types/specials/specials-options-page.php';

// require $dir . '/spark-post-types/dealcards420/cpt-dealcards420.php';
// require $dir . '/spark-post-types/dealcards420/custom-metabox-dealscards420.php';

// require $dir . '/spark-post-types/vendorcards420/cpt-vendorcards420.php';
// require $dir . '/spark-post-types/vendorcards420/custom-metabox-vendorcards420.php';

// for styling the specials options & CPT admin pages
function admin_styles() {
  wp_enqueue_style('admin-styles', plugin_dir_url(__FILE__) . 'css/admin.css');
}

add_action('admin_enqueue_scripts', 'admin_styles');

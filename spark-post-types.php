<?php
/**
 * Plugin Name:     Spark Post Types
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     spark-post-types
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Spark_Post_Types
 */

// Your code starts here.
$dir = plugin_dir_path( __DIR__ );
require $dir . '/spark-post-types/reviews/cpt-reviews.php';
require $dir . '/spark-post-types/reviews/custom-metabox-reviews.php';

require $dir . '/spark-post-types/specials/cpt-specials.php';
require $dir . '/spark-post-types/specials/custom-metabox-specials.php';
require $dir . '/spark-post-types/specials/specials-options-page.php';

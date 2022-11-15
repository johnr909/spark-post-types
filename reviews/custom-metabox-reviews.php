<?php

namespace sparkd;

/**
 * Register the meta box
 */

include 'reviews-vars.php';
  $form = 'custom-fields-review-form.php';
  $nonce = 'review_meta_box_nonce';
  $post_nonce = $_POST['review_meta_box_nonce'];
  $user_cap = 'edit_posts';
  $fields = [
        'spark_reviewer',
        'spark_review_status',
        'spark_review_icon',
    ];



$path = plugin_dir_path(dirname( __FILE__ ));
// echo $path;
include $path . 'functions-meta-box.php';

function register_review_meta_boxes() {
    add_meta_box(
        'reviewer_data_metabox', 
        __( 'Reviewer Data'), 
        '\sparkd\review_display_callback', 
        'reviews','normal', 'high'
    );
}

add_action('add_meta_boxes', '\sparkd\register_review_meta_boxes');

/**
 * Meta box display callback
 * @param WP_Post $post Current post object
 */
function display_callback($post) {
    include $form;
    wp_nonce_field( basename( __FILE__ ), $nonce );
}


/**
 * Save the meta box content
 * @param int $post_id Post ID
 */
function save_review_meta_box( $post_id ) {

    // Return if it's autosave
    if (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions
    if (!current_user_can( $user_cap, $post_id ) ) {
        return;
    }

    // Verify meta box nonce
    if ( !isset( $post_nonce) || !wp_verify_nonce( $post_nonce, basename( __FILE__ ) ) ) {
        return;
    }

    // Check if it's a revision
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }

    // $fields = [
    //     'spark_reviewer',
    //     'spark_review_status',
    //     'spark_review_icon',
    // ];

    // Run the update with sanitized $_POST data
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST )) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}

add_action( 'save_post', '\sparkd\save_review_meta_box' );
echo $form;
var_dump($nonce);
var_dump($fields);

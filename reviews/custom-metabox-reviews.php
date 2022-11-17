<?php

$path = plugin_dir_path(dirname( __FILE__ ));
include $path . 'meta-box-functions.php';

/**
 * Register the meta box
 */

function register_review_meta_boxes() {
    add_meta_box(
        'reviewer_data_metabox', 
        __( 'Reviewer Data'), 
        'review_display_callback', 
        'reviews','normal', 'high'
    );
}

add_action('add_meta_boxes', 'register_review_meta_boxes');

/**
 * Meta box display callback
 * @param WP_Post $post Current post object
 */
function review_display_callback($post) {
    include 'custom-fields-review-form.php';
    wp_nonce_field( basename( __FILE__ ), 'review_meta_box_nonce' );
}


/**
 * Save the meta box content
 * @param int $post_id Post ID
 */
function save_review_meta_box( $post_id ) {

    // return if it's autosave
    is_autosave();

    // check the user's permissions
    if (!current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    // verify the nonce, return if you can't
    $nonce = 'review_meta_box_nonce';
    verify_meta_box( $nonce );

    // check if it's a revision and if so set the $post_id = $parent_id;
    is_revision( $post_id );

    $fields = [
        'spark_reviewer',
        'spark_review_status',
        'spark_review_icon',
    ];

    // run the update with sanitized $_POST data
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST )) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}

add_action( 'save_post', 'save_review_meta_box' );

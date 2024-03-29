<?php

namespace sparkd;

/**
 * Register the meta box
 */
function register_dealcard420_meta_boxes() {
    add_meta_box(
        'dealcard420_data_metabox', 
        __( 'Deal 420 Card Data'), 
        '\sparkd\dealcard420_display_callback', 
        'deals420cards','normal', 'high'
    );
}

add_action( 'add_meta_boxes', '\sparkd\register_dealcard420_meta_boxes' );

/**
 * Meta box display callback
 * @param WP_Post $post Current post object
 */
function dealcard420_display_callback( $post ) {
    include 'custom-fields-dealcards420-form.php';
    wp_nonce_field( basename( __FILE__ ), 'dealcard420_meta_box_nonce' );
}


/**
 * Save the meta box content
 * @param int $post_id Post ID
 */
function save_dealcard420_meta_box( $post_id ) {

	// return if it's autosave
    is_autosave();

    // check the user's permissions
    if (!current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // verify the nonce, return if you can't
    $nonce = 'dealcard420_meta_box_nonce';
    verify_meta_box( $nonce );

	// check if it's a revision and if so set the $post_id = $parent_id;
    is_revision( $post_id );

    $fields = [
        'brandName',
        'saleDate',
        'dealDescription1',
        'dealDescription2',
        'dealDescription3',
        'exclusive420',
        'dealDescription420a',
        'dealDescription420b',
        'exclusions'
    ];

    // Run the update with sanitized $_POST data
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}

add_action( 'save_post', '\sparkd\save_dealcard420_meta_box' );

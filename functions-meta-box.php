<?php

$nonce = 'review_meta_box_nonce';
$fields = [
        'spark_reviewer',
        'spark_review_status',
        'spark_review_icon',
    ];

function save_meta_box( $post_id ) {

    // Return if it's autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }

    // Check the user's permissions
    if (!current_user_can( 'edit_post', $post_id ) ){
      return;
    }

    // Verify meta box nonce
    if (!isset( $_POST[$nonce]) || !wp_verify_nonce( $_POST[$nonce], basename( __FILE__ ) ) ) {
      return;
    }

    // Check if it's a revision
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }

    // Run the update with sanitized $_POST data
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
     
}

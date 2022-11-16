<?php
function set_nonce_field($nonce) {
  $nonce_field = wp_nonce_field( basename( __FILE__ ), $nonce );
}

// return if it's autosave
function is_autosave() { 
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
}

// check if the user can edit posts
function current_user_can( $post_id ) {
  if (!current_user_can( 'edit_post', $post_id ) ) {
    return;
  }
}

// check if the nonce is verified
function verify_meta_box( $nonce ) {
    if ( !isset( $_POST[$nonce]) || !wp_verify_nonce( $_POST[$nonce], basename( __FILE__ ) ) ) {
        return;
    }
}

// check if it's a revision
function is_revison( $post_id) {
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
}

// sanitize the meta box fields
function sanitize_meta_box_fields( $fields ) {
  foreach ( $fields as $field ) {
    if ( array_key_exists( $field, $_POST )) {
        update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
    }
  }
}

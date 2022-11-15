<?php

$post_id; // globally available, yeah!
$post; // globally available, yeah!

// $meta_box_name 'reviewer_data_metabox';
// $meta_box_ui_name = 'Review Data';
// $meta_box_callback_name = '\sparkd\review_display_callback';
// $meta_box_slug = 'reviews';

// function register_meta_box() {
//     add_meta_box(
//         $meta_box_name, 
//         __( 'Reviewer Data'), 
//         '\sparkd\review_display_callback', 
//         'reviews','normal', 'high'
//     );
// }

// function display_callback( $post, $form, $nonce ) {
//   include $form;
//   wp_nonce_field( basename( __FILE__ ), $nonce );
// }

// function set_nonce_field() {
//   $nonce_field = wp_nonce_field( basename( __FILE__ ), $nonce );
//   return $nonce_field;
// }

// // return true if it's autosave
// function is_autosave() { 
//     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
//         return true;
//     }
// }

// // return true if the user can edit posts
// function current_user_can( $post_id ) {
//   if (!current_user_can( 'edit_post', $post_id ) ) {
//     return true;
//   }
// }

// // return true if the nonce is verified
// function verify_meta_box( $nonce ) {
//   if ( !isset( $_POST[$nonce]) || !wp_verify_nonce( $_POST[$nonce], basename( __FILE__ ) ) ) {
//         return true;
//     }
// }

// // return true if it's a revision
// function is_revison( $post_id) {
//   if ( $parent_id = wp_is_post_revision( $post_id ) ) {
//         $post_id = $parent_id;
//     }
// }

// function sanitize_meta_box_fields( $fields ) {
//   foreach ( $fields as $field ) {
//     if ( array_key_exists( $field, $_POST )) {
//         update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
//     }
//   }
// }

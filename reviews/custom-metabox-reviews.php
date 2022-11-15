<?php

namespace sparkd;

/**
 * Register the meta box
 */

include 'reviews-vars.php';
  
// $path = plugin_dir_path(dirname( __FILE__ ));
// echo $path;
// include $path . 'functions-meta-box.ph';

function register_review_meta_boxes() {
    add_meta_box(
        'reviewer_data_metabox', 
        __( 'Reviewer Data'), 
        '\sparkd\display_callback', 
        'reviews','normal', 'high'
    );
}

add_action('add_meta_boxes', '\sparkd\register_review_meta_boxes');

/**
 * Meta box display callback
 * @param WP_Post $post Current post object
 */
function display_callback($post) {
    include 'custom-fields-review-form.php';
    wp_nonce_field( basename( __FILE__ ), 'review_meta_box_nonce' );
}

// function set_nonce_field($nonce) {
//   $nonce_field = wp_nonce_field( basename( __FILE__ ), $nonce );
// }

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

/**
 * Save the meta box content
 * @param int $post_id Post ID
 */
// set_nonce_field($nonce);

function save_review_refactor_meta_box( $post_id ) {
    $form = 'custom-fields-review-form.php';
  $nonce = 'review_meta_box_nonce';
  $post_nonce = $_POST['review_meta_box_nonce'];
  $user_cap = 'edit_posts';
  $fields = [
        'spark_reviewer',
        'spark_review_status',
        'spark_review_icon',
    ];
    // Is it an autosave?
    // is_autosave();

    // Check the user's permissions
    // current_user_can( $post_id );

    // Verify meta box nonce
    // verify_meta_box( $nonce );

    // Check if it's a revision
    // is_revison( $post_id);

    // Run the update with sanitized $_POST data
    // sanitize_meta_box_fields( $fields );
}

function save_review_meta_box( $post_id ) {

    // Return if it's autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions
    if (!current_user_can( 'edit_post', $post_id ) ){
          return;
      }

    // Verify meta box nonce
    if (!isset( $_POST['review_meta_box_nonce']) || !wp_verify_nonce( $_POST['review_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    // Check if it's a revision
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }

    $fields = [
        'spark_reviewer',
        'spark_review_status',
        'spark_review_icon',
    ];

    // Run the update with sanitized $_POST data
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}

add_action( 'save_post', '\sparkd\save_review_meta_box' );
// echo $form;
// var_dump($nonce);
// var_dump($fields);

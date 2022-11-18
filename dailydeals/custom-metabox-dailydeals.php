<?php
/**
 * Register the meta box
 */
function register_dailydeals_meta_boxes() {
    add_meta_box( 'dailydeals_data_metabox', 
                   __( 'Daily Deals Data'), 
                  'dailydeals_display_callback', 
                  'dailydeals','normal', 'high'
    );
}

add_action( 'add_meta_boxes', 'register_dailydeals_meta_boxes' );

/**
 * Meta box display callback
 * @param WP_Post $post Current post object
 */
function dailydeals_display_callback( $post ) {
    include 'custom-fields-dailydeals-form.php';
    wp_nonce_field( basename( __FILE__ ), 'dailydeals_meta_box_nonce' );
}


/**
 * Save the meta box content
 * @param int $post_id Post ID
 */
function save_dailydeals_meta_box( $post_id ) {

    // return if it's autosave
    is_autosave();

    // check the user's permissions
    if (!current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // verify the nonce, return if you can't
    $nonce = 'dailydeals_meta_box_nonce';
    verify_meta_box( $nonce );

    // check if it's a revision and if so set the $post_id = $parent_id;
    is_revision( $post_id );

    $fields = [
        'dealTitle',
        'dealLeadOff',
        'dealDescriptionText',
        'dealLeadOff2',
        'dealDescriptionText2',
    ];

    // Run the update with sanitized $_POST data
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST )) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field]) );
        }
     }
}

add_action( 'save_post', 'save_dailydeals_meta_box' );

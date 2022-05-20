<?php
/**
 * Register the meta box
 */
function register_review_meta_boxes() {
    add_meta_box( 
        'reviewer_data_metabox', 
        __(  'Reviewer Data' ), 
        'review_display_callback', 
        'reviews','normal', 'high' 
    );
}

add_action( 'add_meta_boxes', 'register_review_meta_boxes' );

/**
 * Meta box display callback
 * @param WP_Post $post Current post object
 */
function review_display_callback( $post ) {
    include 'custom-fields-review-form.php';
    wp_nonce_field( basename( __FILE__ ), 'review_meta_box_nonce' );
}


/**
 * Save the meta box content
 * @param int $post_id Post ID
 */
function save_review_meta_box( $post_id ) {

	// Return if it's autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    	return;
    }

    // Check the user's permissions
    if ( !current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

    // Verify meta box nonce
    if  (!isset( $_POST['review_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['review_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

	// Check if it's a revision
    if ($parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }

    $fields = [
        'spark_reviewer',
        'spark_review_status',
        'spark_review_icon', 
    ];

    // Run the update with sanitized $_POST data
    foreach ( $fields as $field ) {
        if (array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}

add_action( 'save_post', 'save_review_meta_box' );

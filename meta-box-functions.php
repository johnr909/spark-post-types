<?php

function is_autosave() { 
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
}

function is_revision( $post_id) {
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
}

function verify_meta_box( $nonce ) {
    if ( !isset( $_POST[$nonce]) || !wp_verify_nonce( $_POST[$nonce], basename( __FILE__ ) ) ) {
        return;
    }
}

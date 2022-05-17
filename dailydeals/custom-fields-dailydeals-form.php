<div class="fields-meta-box">
<?php
    $deal_title = get_post_meta( $post->ID, 'dealTitle', true );
    $deal_lead_off = get_post_meta( $post->ID, 'dealLeadOff', true );
    $deal_description_text = get_post_meta( $post->ID, 'dealDescriptionText', true );
?>
    <p class="custom-field-control">
        <label for="dealTitle"><?php _e( 'Deal Title', 'spark-post-types' ); ?></label>
        <input id="dealTitle" 
               type="text" 
               name="dealTitle"
               value="<?php echo esc_attr( $deal_title ); ?>">
    </p>

    <p class="custom-field-control">
        <label for="dealLeadOff"><?php _e( 'Deal Lead Off', 'spark-post-types' ); ?></label>
        <input id="dealLeadOff" 
               type="text" 
               name="dealLeadOff"
               value="<?php echo esc_attr( $deal_lead_off ); ?>">
    </p>

    <p class="custom-field-control">
        <label for="dealDescriptionText"><?php _e( 'Deal Description', 'spark-post-types' ); ?></label>
        <textarea id="dealDescriptionText"  
                  name="dealDescriptionText"
                  value="<?php echo esc_attr( $deal_description_text ); ?>"
                  rows="4" cols="50">
            <?php echo esc_attr( $deal_description_text ); ?>
        </textarea>
    </p>

</div><!-- /.fields-meta-box -->

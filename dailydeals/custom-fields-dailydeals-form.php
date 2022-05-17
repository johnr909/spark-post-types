<div class="box">
    <style scoped>
        .box {
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .field {
            display: contents;
        }
    </style>
<?php
    $deal_title = get_post_meta($post->ID, 'dealTitle', true);
    $deal_description = get_post_meta($post->ID, 'dealDescription', true);
?>
    <p class="field">
        <label for="dealTitle"><?php _e('Deal Title', 'spark-post-types'); ?></label>
        <input id="dealTitle" 
               type="text" 
               name="dealTitle"
               value="<?php echo esc_attr($deal_title); ?>">
    </p>

    <p class="field">
        <label for="dealDescription"><?php _e('Deal Description', 'spark-post-types'); ?></label>
        <input id="dealDescription"  
                  name="dealDescription"
                  type="text"
                  value="<?php echo esc_attr($deal_description); ?>">
    </p>

</div><!-- /.box -->

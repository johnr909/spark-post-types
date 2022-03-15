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
    $specials_title = get_post_meta($post->ID, 'specialsTitle', true);
    $specials_description = get_post_meta($post->ID, 'specialsDescription', true);
    $specials3 = get_post_meta($post->ID, 'specials3', true);
?>
    <p class="field">
        <label for="specialsTitle"><?php _e('Specials Title', 'wp-bootstrap-starter'); ?></label>
        <input id="specialsTitle" 
               type="text" 
               name="specialsTitle"
               value="<?php echo esc_attr($specials_title); ?>">
    </p>

    <p class="field">
        <label for="specialsDescription"><?php _e('Specials Description', 'wp-bootstrap-starter'); ?></label>
        <input id="specialsDescription"  
                  name="specialsDescription"
                  type="text"
                  value="<?php echo esc_attr($specials_description); ?>">
    </p>

 <!--    <p class="field">
        <label for="specials3">Specials 3</label>
        <input type="text" 
               name="specials3" 
               id="specials3"
               value="<?php //echo esc_attr($specials3); ?>">
    </p> -->
</div><!-- /.box -->

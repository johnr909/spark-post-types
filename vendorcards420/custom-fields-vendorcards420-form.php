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
    $vendor_name = get_post_meta($post->ID, 'vendorName', true);
    $vendor_description = get_post_meta($post->ID, 'vendorDescription', true);
    $product_url = get_post_meta($post->ID, 'productUrl', true);
?>
    <p class="field">
        <label for="vendorName"><?php _e('Vendor Name', 'spark-post-types'); ?></label>
        <input id="vendorName" 
               type="text" 
               name="vendorName"
               value="<?php echo esc_attr($vendor_name); ?>">
    </p>

    <p class="field">
        <label for="vendorDescription"><?php _e('Vendor Description', 'spark-post-types'); ?></label>
        <input id="vendorDescription"  
                  name="vendorDescription"
                  type="text"
                  value="<?php echo esc_attr($vendor_description); ?>">
    </p>

    <p class="field">
        <label for="productUrl"><?php _e('Product URL', 'spark-post-types'); ?></label>
        <input type="text" 
               name="productUrl" 
               id="productUrl"
               value="<?php echo esc_attr($product_url); ?>">
    </p>
</div><!-- /.box -->

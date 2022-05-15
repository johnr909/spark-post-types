<?php 
// Using get_post_meta($post->ID) and similar functions was not working. The home page has an id (value = 2 ) 
// but that didn't return anything. While in this loop, get_the_ID() returns the id of the individual review
// and that apparently works
$id = get_the_ID();
$vendor_name = get_post_meta($id, 'vendorName', true);
$vendor_description = get_post_meta($id, 'vendorDescription', true);
$vendor_product_link = get_post_meta($id, 'productUrl', true);

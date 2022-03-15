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
    $reviewer = get_post_meta($post->ID, 'jr_reviewer', true);
    $review_status = get_post_meta($post->ID, 'spark_review_status', true);
    $icon = get_post_meta($post->ID, 'spark_review_icon', true);
?>
    <p class="field">
        <label for="jr_reviewer">Reviewer</label>
        <input id="jr_reviewer" 
               type="text" 
               name="jr_reviewer"
               value="<?php echo esc_attr($reviewer); ?>">
    </p>

    <p class="field">
    <label for="spark_review_status">Is this review active?</label>
    <br><br>
    <input type="radio" name="spark_review_status" 
           value="yes"          
           <?php if($review_status === 'yes') { 
               echo 'checked="checked"'; 
             } 
           ?>/> Yes<br />
    <input type="radio" name="spark_review_status" 
           value="no"
           <?php if($review_status === 'no') { 
               echo ' checked="checked"'; 
             } 
           ?>
           /> No
    </p>
    <p class="field">
        <label for="jr_reviewer">Icon<br>Valid values: cannabis, seedling & joint</label>
        <input type="text" 
               name="spark_review_icon" 
               id="spark_review_icon"
               value="<?php echo esc_attr($icon); ?>">
    </p>
</div><!-- /.box -->

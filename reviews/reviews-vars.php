<?php
  $form = 'custom-fields-review-form.php';
  $nonce = 'review_meta_box_nonce';
  $post_nonce = $_POST['review_meta_box_nonce'];
  $user_cap = 'edit_posts';
  $fields = [
        'spark_reviewer',
        'spark_review_status',
        'spark_review_icon',
    ];

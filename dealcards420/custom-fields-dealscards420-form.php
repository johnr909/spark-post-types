<div class="box">
    
    <?php include_once 'deal-card-vars.php'; ?>

    <p class="field">
        <label for="brandName"><?php _e( 'Brand Name', 'spark-post-types' ); ?></label>
        <input id="brandName" 
               type="text" 
               name="brandName"
               value="<?php echo esc_attr( $brand_name ); ?>">
    </p>

    <p class="field">
        <label for="saleDate"><?php _e( 'Sale Date', 'spark-post-types' ); ?></label>
        <input type="text" 
               name="saleDate" 
               id="saleDate"
               value="<?php echo esc_attr( $sale_date ); ?>">
    </p>

    <p class="field">
        <label for="dealDescription1"><?php _e( 'Deal Description1', 'spark-post-types' ); ?></label>
        <input id="dealDescription1"  
                  name="dealDescription1"
                  type="text"
                  value="<?php echo esc_attr( $deal_description1 ); ?>">
    </p>

    <p class="field">
        <label for="dealDescription2"><?php _e( 'Deal Description 2', 'spark-post-types' ); ?></label>
        <input id="dealDescription2"  
                  name="dealDescription2"
                  type="text"
                  value="<?php echo esc_attr( $deal_description2 ); ?>">
    </p>

    <p class="field">
        <label for="dealDescription3"><?php _e( 'Deal Description 3', 'spark-post-types' ); ?></label>
        <input id="dealDescription3"  
                  name="dealDescription3"
                  type="text"
                  value="<?php echo esc_attr( $deal_description3 ); ?>">
    </p>


    <p class="field">
    <label for="exclusive420">Is this an exclusive 420 deal?</label>
    <br><br>
    <input type="radio" name="exclusive420" 
           value="yes"          
           <?php if( $exclusive420 === 'yes' ) { 
               _e( 'checked="checked"', 'spark-post-types' ); 
             } 
           ?>/> Yes<br />
    <input type="radio" name="exclusive420" 
           value="no"
           <?php if( $exclusive420 === 'no' ) { 
               _e(' checked="checked"', 'spark-post-types' ); 
             } 
           ?>
           /> No
    </p>

    <p class="field">
        <label for="dealDescription420a"><?php _e( '420 Deal Description 1', 'spark-post-types' ); ?></label>
        <input id="dealDescription420a"  
                  name="dealDescription420a"
                  type="text"
                  value="<?php echo esc_attr( $deal_description420a ); ?>">
    </p>

    <p class="field">
        <label for="dealDescription420b"><?php _e( '420 Deal Description 2', 'spark-post-types' ); ?></label>
        <input id="dealDescription420b"  
                  name="dealDescription420b"
                  type="text"
                  value="<?php echo esc_attr( $deal_description420b ); ?>">
    </p>

    <p class="field">
        <label for="exclusions"><?php _e( 'Exclusions', 'spark-post-types' ); ?></label>
        <input type="text" 
               name="exclusions" 
               id="exclusions"
               value="<?php echo esc_attr( $exclusions ); ?>">
</div><!-- /.box -->

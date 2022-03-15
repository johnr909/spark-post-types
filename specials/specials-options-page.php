<?php
/* Special Options Settings Page */
class SpecialsOptions {

    public function __construct() {
    	// Hook into the admin menu
    	add_action( 'admin_menu', array( $this, 'create_specials_settings_page' ) );

        // Add Settings and Fields
    	add_action( 'admin_init', array( $this, 'setup_sections' ) );
    	add_action( 'admin_init', array( $this, 'setup_fields' ) );
    }

    public function create_specials_settings_page() {
        // Add the menu item and page
        $page_title = 'Specials Options Page';
        $menu_title = 'Specials Options Page';
        $capability = 'manage_options';
        $slug = 'smashing_fields';
        $callback = array( $this, 'specials_settings_page_content' );

        add_submenu_page( 'edit.php?post_type=specials', $page_title, $menu_title, $capability, $slug, 
            $callback );
    }

    public function specials_settings_page_content() {?>
    	<div class="wrap">
    		<h2>Specials Options Page</h2><?php
            if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
                  $this->admin_notice();
            } ?>
    		<form method="POST" action="options.php">
                <?php
                    settings_fields( 'smashing_fields' );
                    do_settings_sections( 'smashing_fields' );
                    submit_button();
                ?>
    		</form>
    	</div> <?php
    }
    
    public function admin_notice() { ?>
        <div class="notice notice-success is-dismissible">
            <p>Your settings have been updated!</p>
        </div><?php
    }

    public function setup_sections() {
        add_settings_section( 'section_one', '<span class="dashicons dashicons-format-aside"></span>', array( $this, 'section_callback' ), 'smashing_fields' );
    }

    public function section_callback( $arguments ) {

        if( $arguments['id'] == 'section_one' ) {
            echo "<p class='admin-options'>Enter the image path of the Westword Ad and it's run dates and you're good to go!</p>";
        }
    }

    public function setup_fields() {
        $fields = array(
        	array(
        		'uid' => 'westword_ad_image_path',
        		'label' => 'Westword Ad Image Path',
        		'section' => 'section_one',
        		'type' => 'text',
        		'placeholder' => '',
        		'helper' => '',
        		'supplimental' => 'copy and paste the complete image path from the image in the Media Library',
        	),
            array(
                'uid' => 'westword_ad_run_dates',
                'label' => 'Westword Ad Run Date',
                'section' => 'section_one',
                'type' => 'text',
                'placeholder' => '',
                'helper' => '',
                'supplimental' => 'format example: 3/1 - 3/7 ',
            ),

           'default' => array()

        );

    	foreach( $fields as $field ){
        	add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'smashing_fields', $field['section'], $field );
            register_setting( 'smashing_fields', $field['uid'] );
    	}
    }

    public function field_callback( $arguments ) {

        $value = get_option( $arguments['uid'] );

        if( ! $value ) {
            $value = $arguments['default'];
        }

        switch( $arguments['type'] ){
            case 'text':
            case 'password':
            case 'number':
                printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                break;
            case 'textarea':
                printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
                break;
        }

        if( $helper = $arguments['helper'] ){
            printf( '<span class="helper"> %s</span>', $helper );
        }

        if( $supplimental = $arguments['supplimental'] ){
            printf( '<p class="description">%s</p>', $supplimental );
        }

    }

}
new SpecialsOptions();

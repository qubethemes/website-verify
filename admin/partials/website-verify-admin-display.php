<?php

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
 die;
} 
	 ?>
<div class="wrap">
	<div class="website-verify">
       <div class="header">
		<h2 class="website-verify-icon"><?php echo esc_html( get_admin_page_title() ); ?></h2>
       </div>
		<div class="welcome-panel">
			<div class="welcome-panel-content">
			<?php settings_errors(); ?>
				<form method="POST" action="options.php">
					<?php settings_fields( 'website-verify' );
					do_settings_sections( 'website-verify' );
				
                    submit_button();
					?>
                </form>
            </div>    
        </div>
    </div>
</div>  


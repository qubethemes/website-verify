<?php

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
 die;
} 
?>
<div class="wrap">
	<div class="website-verify">

		<h2 class="vo-icon"><?php echo esc_html( get_admin_page_title() ); ?></h2>

		<div class="welcome-panel">
			<div class="welcome-panel-content">

				<form method="POST" action="options.php">
					<?php settings_fields( 'website_verify' );
					do_settings_sections( 'website_verify_options' );
					$options = get_option( 'website_verify_options' );
					?>

					<div class="welcome-panel-column-container">
						<div class="welcome-panel-column">

							<h4><?php _e( 'Webmaster Verification', 'website-verify' ); ?></h4>

							<p>
								<label><?php _e( 'Google Verification ID', 'website-verify' ) ?></label>
								<input id="<?php echo esc_attr( 'website_verify_options[google_verify]' ); ?>" class="regular-text" type="text" name="<?php echo esc_attr(
								'website_verify_options[google_verify]' ); ?>" value="<?php echo ( !empty( $options['google_verify'] ) ) ? esc_html( $options['google_verify'] ) : ''; ?>"/>
							</p>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div>    
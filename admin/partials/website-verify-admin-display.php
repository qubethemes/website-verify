<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
?>
<div class="wrap">
    <div class="website-verify-wrapper">
        <div class="website-verify-header">

            <a class="website-verify-brand" href="#">
                <img src="<?php echo esc_url(WEBSITE_VERIFY_URL) . 'admin/images/logo.svg'; ?>" alt="" class="d-inline-block align-text-top" width="40" height="40">

                <?php echo esc_html(get_admin_page_title()); ?>
            </a>
            <a class="website-verify-version" href="#">
                Plugin Version: <?php echo WEBSITE_VERIFY_VERSION; ?>
            </a>
        </div>
        <div class="welcome-panel">
            <div class="welcome-panel-content">
                <?php settings_errors(); ?>
                <form method="POST" action="options.php">
                    <?php settings_fields('website-verify');
                    do_settings_sections('website-verify');
                    $options = get_option('website_verify_options');
                    ?>
                    <div class="website-verify-container">
                        <?php
                        //display form here
                        $this->settings;
                        ?>
                        <h2><?php _e('Webmaster Verification', 'website-verify'); ?></h2>
                        <p class="sub-title">
                            Please fill your meta tag and analytics information.
                        </p>
                        <div class="row">
                            <?php
                            $this->settings->output();
                            ?>
                        </div>
                        <?php submit_button('Save Changes', 'update-tags'); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
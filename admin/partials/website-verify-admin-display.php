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
                <img src="<? echo __(Website_Verify_URL . 'admin/images/logo.svg') ?>" alt="" class="d-inline-block align-text-top" width="40" height="40">

                <?php echo esc_html(get_admin_page_title()); ?>
            </a>
            <a class="website-verify-version" href="#">
                Plugin Version: <?php echo Website_Verify_VERSION; ?>
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
                    <h2><?php _e('Webmaster Verification', 'website-verify'); ?></h2>
                    <p class="sub-title">
                        Please fill your meta tag and analytics information.
                    </p>
                       <div class="row">
                        <div class="column p1">
                            <h3 class="section_title"> Meta Tag Info</h3>
                            <div class="instruction">
                                <strong>Instructions</strong>
                                <p> 1. Copy the code from the content attribute,as shown in example:<br/>
                                &lt;meta name="google-site-verification" content="<code>Zf6gKlRQGrTESbyS5HPHftpVDjH_GY56UYTTdFFre</code>" /&gt;. 
                                <p>2. Add your site verification code and in respective meta tag and save the changes.</p>
                                <p>3. Meta Tags will be inserted in header section</p>

                            </div>
                            <div class="input-group">
                                <label for="<?php echo esc_attr('website_verify_options[google_verify]'); ?>"><?php _e('Google Webmaster Verification'); ?></label>
                                <input type="text" class="form-control" id="<?php echo esc_attr('website_verify_options[google_verify]'); ?>" name="<?php echo esc_attr(
                                                                                                                                                        'website_verify_options[google_verify]'
                                                                                                                                                    ); ?>" aria-describedby="googleVerify" value="<?php echo (!empty($options['google_verify'])) ? esc_html($options['google_verify']) : ''; ?>" placeholder="Enter only id" />


                                <small id="googleVerify" class="form-text text-muted">We'll never share your email with anyone else.</small>

                            </div>
                            <div class="input-group">
                                <label for="<?php echo esc_attr('website_verify_options[bing_verify]'); ?>"><?php _e('Bing Webmaster Verification'); ?></label>
                                <input type="text" class="form-control" id="<?php echo esc_attr('website_verify_options[bing_verify]'); ?>" name="<?php echo esc_attr(
                                                                                                                                                        'website_verify_options[bing_verify]'
                                                                                                                                                    ); ?>"  aria-describedby="bingVerify" value="<?php echo (!empty($options['bing_verify'])) ? esc_html($options['bing_verify']) : ''; ?>" placeholder="Enter only id" />


                                <small id="bingVerify" class="form-text text-muted">We'll never share your email with anyone else.</small>

                            </div>
                            <div class="input-group">
                                <label for="<?php echo esc_attr('website_verify_options[baidu_verify]'); ?>"><?php _e('Baidu Webmaster Verification'); ?></label>
                                <input type="text" class="form-control" id="<?php echo esc_attr('website_verify_options[baidu_verify]'); ?>"  name="<?php echo esc_attr(
                                                                                                                                                        'website_verify_options[baidu_verify]'
                                                                                                                                                    ); ?>" aria-describedby="baiduVerify" value="<?php echo (!empty($options['baidu_verify'])) ? esc_html($options['baidu_verify']) : ''; ?>" placeholder="Enter only id" />


                                <small id="baiduVerify" class="form-text text-muted">We'll never share your email with anyone else.</small>

                            </div>
                            <div class="input-group">
                                <label for="<?php echo esc_attr('website_verify_options[yandex_verify]'); ?>"><?php _e('Yandex Webmaster Verification'); ?></label>
                                <input type="text" class="form-control" id="<?php echo esc_attr('website_verify_options[yandex_verify]'); ?>"  name="<?php echo esc_attr(
                                                                                                                                                        'website_verify_options[yandex_verify]'
                                                                                                                                                    ); ?>"aria-describedby="yandexVerify" value="<?php echo (!empty($options['yandex_verify'])) ? esc_html($options['yandex_verify']) : ''; ?>" placeholder="Enter only id" />


                                <small id="yandexVerify" class="form-text text-muted">We'll never share your email with anyone else.</small>

                            </div>
                            <div class="input-group">
                                <label for="<?php echo esc_attr('website_verify_options[norton_verify]'); ?>"><?php _e('Norton Webmaster Verification'); ?></label>
                                <input type="text" class="form-control" id="<?php echo esc_attr('website_verify_options[norton_verify]'); ?>"  name="<?php echo esc_attr(
                                                                                                                                                        'website_verify_options[norton_verify]'
                                                                                                                                                    ); ?>"aria-describedby="nortonVerify" value="<?php echo (!empty($options['norton_verify'])) ? esc_html($options['norton_verify']) : ''; ?>" placeholder="Enter only id" />


                                <small id="nortonVerify" class="form-text text-muted">We'll never share your email with anyone else.</small>

                            </div>
                            <div class="input-group">
                                <label for="<?php echo esc_attr('website_verify_options[pinterest_verify]'); ?>"><?php _e('Pinterest Webmaster Verification'); ?></label>
                                <input type="text" class="form-control" id="<?php echo esc_attr('website_verify_options[pinterest_verify]'); ?>"  name="<?php echo esc_attr(
                                                                                                                                                        'website_verify_options[pinterest_verify]'
                                                                                                                                                    ); ?>"aria-describedby="pinterestVerify" value="<?php echo (!empty($options['pinterest_verify'])) ? esc_html($options['pinterest_verify']) : ''; ?>" placeholder="Enter only id" />


                                <small id="pinterestVerify" class="form-text text-muted">We'll never share your email with anyone else.</small>

                            </div>
                        </div>
                        <div class="column p1">
                        <h3 class="section_title"> Analytics Scripts</h3>
                        <div class="instruction">
                                <strong>Instructions</strong>
                                <p> 1. Copy the script tags and paste in the text area : Example of script tag<br/>
                               <code>&lt; script &gt;
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-xxxxxx-1', 'auto');
  ga('send', 'pageview');
  &lt;/ script &gt;</code>
                                <p>2. You can add unlimited script tags in the text area</p>
                                <p>3. Keep space between tags for readabilty purpose</p>

                            </div>
                            <div class="input-group">
                                <label for="<?php echo esc_attr('website_verify_options[google_verify]'); ?>">Scripts for traffic & Statistic </label>
                                <textarea class="form-control" id="<?php echo esc_attr('website_verify_options[analytics_code]'); ?>" name="<?php echo esc_attr(
                                                                                                                                                        'website_verify_options[analytics_code]'
                                                                                                                                                    ); ?>" cols="10" rows="15"><?php echo (!empty($options['analytics_code'])) ? esc_html($options['analytics_code']) : ''; ?></textarea>
                            </div>
                        </div>
                       </div>
                       <?php  submit_button ( 'Save Changes', 'update-tags' ); ?>
                    </div>
                    
                   

                </form>
            </div>
        </div>
        
    </div>
</div>
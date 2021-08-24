<?php

class Website_Verify_Frontend
{


    public function __construct()
    {

        add_action('wp_head', array($this, 'website_verify_head'));

        add_action('wp_footer', array($this, 'website_verify_footer'), 999);

    }

    /**
     * Insert the code into header
     */
    public function website_verify_head()
    {

        $website_verify_options = website_verify_options();

        if (!empty($website_verify_options['google_verify'])) {
            echo '<meta name="google-site-verification" content="' . esc_attr($website_verify_options['google_verify']) . '" />' . "\n";
        }

        if (!empty($website_verify_options['bing_verify'])) {
            echo '<meta name="msvalidate.01" content="' . esc_attr($website_verify_options['bing_verify']) . '" />' . "\n";
        }
        if (!empty($website_verify_options['baidu_verify'])) {
            echo '<meta name="baidu-site-verification" content="' . esc_attr($website_verify_options['baidu_verify']) . '" />' . "\n";
        }
        if (!empty($website_verify_options['yandex_verify'])) {
            echo '<meta name="yandex-verification" content="' . esc_attr($website_verify_options['yandex_verify']) . '" />' . "\n";
        }
        if (!empty($website_verify_options['norton_verify'])) {
            echo '<meta name="norton-safeweb-site-verification" content="' . esc_attr($website_verify_options['norton_verify']) . '" />' . "\n";
        }
        if (!empty($website_verify_options['pinterest_verify'])) {
            echo '<meta name="p:domain_verify" content="' . esc_attr($website_verify_options['pinterest_verify']) . '" />' . "\n";
        }
    }

    /**
     * Insert the code into footer
     */
    public function website_verify_footer()
    {
        $website_verify_options = website_verify_options();

        $analytics_scripts = isset($website_verify_options['analytics_scripts_field']) ? $website_verify_options['analytics_scripts_field'] : '';

        if (!empty($analytics_scripts)) {

            echo wp_kses($analytics_scripts, array(

                    'script' => array()
                )
            );

        }

    }

}

new Website_Verify_Frontend();
<?php

class Website_Verify_Admin_Settings extends Webstie_Verify_Admin_Setings_Abstract
{

    public function get_fields()
    {
        // TODO: Implement get_fields() method.

        return apply_filters('website_verify_admin_settings', array(
            'meta_tag_info' => array(
                'title' => __('Meta Tag Info', 'website-verify'),
                'instructions' => array(
                    'title' => __('Instructions', 'website-verify'),
                    'lists' => array(
                        '1. Copy the code from the content attribute,as shown in example:<br/>
                                &lt;meta name="google-site-verification" content="<code>Zf6gKlRQGrTESbyS5HPHftpVDjH_GY56UYTTdFFre</code>"',
                        '2. Add your site verification code and in respective meta tag and save the changes.',
                        '3. Meta Tags will be inserted in header section'
                    ),
                    'allowed_html' => array(
                        'br' => array(),
                        'code' => array(),

                    )
                ),
                'type' => 'section',
                'fields' =>
                    array(
                        'google_verify' => array(
                            'parent_id' => 'website_verify_options',
                            'title' => __('Google Webmaster Verification', 'website-verify'),
                            'placeholder' => __('Enter only id', 'website-verify'),
                            'description' => sprintf(
                                __('1If you havent registered for Google Webmaster Verification Console, Go to %s You can Put the lin khere %s', 'website-verify'),
                                '<a target="_blank" href="https://search.google.com/search-console/youcanputthelinkhere">', '</a>'
                            ), 'type' => 'input'

                        ),
                        'google_verify_1' => array(
                            'parent_id' => 'website_verify_options',
                            'title' => __('Google Webmaster Verification1', 'website-verify'),
                            'placeholder' => __('Enter only id1', 'website-verify'),
                            'description' => sprintf(
                                __('1If you havent registered for Google Webmaster Verification Console, Go to %s Sign Up Checking %s', 'website-verify'),
                                '<a target="_blank" href="https://search.google.com/search-console/ownership">', '</a>'
                            ),
                            'type' => 'textarea'

                        )
                    )

            )
        ));

    }

    public function output()
    {
        self::render_output();
    }

}

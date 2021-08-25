<?php

class Website_Verify_Admin_Settings extends Webstie_Verify_Admin_Setings_Abstract
{

    public function get_fields()
    {
        //Implement get_fields() method.

        return apply_filters('website_verify_admin_settings', array(
            'meta_tag_info' => array(
                'title' => __('Meta Tag Info', 'website-verify'),
                'instructions' => array(
                    'title' => __('Instructions', 'website-verify'),
                    'lists' => array(
                        ' Copy the code from the content attribute,as shown in example:<br/>
                                &lt;meta name="google-site-verification" content="<code>Zf6gKlRQGrTESbyS5HPHftpVDjH_GY56UYTTdFFre</code>"/>',
                        ' Add your site verification code and in respective meta tag and save the changes.',
                        ' Meta Tags will be inserted in header section'
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
                                __('If you havent registered for Google Webmaster Verification Console, Go to %s Signup Here %s', 'website-verify'),
                                '<a target="_blank" href="https://search.google.com/search-console/ownership">', '</a>'
                            ), 'type' => 'input'

                        ),
                        'bing_verify' => array(
                            'parent_id' => 'website_verify_options',
                            'title' => __('Bing Webmaster Verification', 'website-verify'),
                            'placeholder' => __('Enter only id', 'website-verify'),
                            'description' => sprintf(
                                __('If you havent registered for Bing Webmaster Verification Console, Go to %s Signup Here %s', 'website-verify'),
                                '<a target="_blank" href="https://www.bing.com/toolbox/webmaster">', '</a>'
                            ), 'type' => 'input'

                        ),
                        'baidu_verify' => array(
                            'parent_id' => 'website_verify_options',
                            'title' => __('Baidu Webmaster Verification', 'website-verify'),
                            'placeholder' => __('Enter only id', 'website-verify'),
                            'description' => sprintf(
                                __('If you havent registered for Baidu Webmaster Verification Console, Go to %s Signup Here %s', 'website-verify'),
                                '<a target="_blank" href="https://passport.baidu.com/v2/?reg">', '</a>'
                            ), 'type' => 'input'

                        ),
                        'yandex_verify' => array(
                            'parent_id' => 'website_verify_options',
                            'title' => __('Yandex Webmaster Verification', 'website-verify'),
                            'placeholder' => __('Enter only id', 'website-verify'),
                            'description' => sprintf(
                                __('If you havent registered for Yandex Webmaster Verification Console, Go to %s Signup Here %s', 'website-verify'),
                                '<a target="_blank" href="https://passport.yandex.com/registration?origin=webmaster">', '</a>'
                            ), 'type' => 'input'

                        ),
                        'norton_verify' => array(
                            'parent_id' => 'website_verify_options',
                            'title' => __('Norton Webmaster Verification', 'website-verify'),
                            'placeholder' => __('Enter only id', 'website-verify'),
                            'description' => sprintf(
                                __('If you havent registered for Norton Webmaster Verification Console, Go to %s Signup Here %s', 'website-verify'),
                                '<a target="_blank" href="https://safeweb.norton.com/saml/login">', '</a>'
                            ), 'type' => 'input'

                        ),
                        'pinterest_verify' => array(
                            'parent_id' => 'website_verify_options',
                            'title' => __('Pinterest Webmaster Verification', 'website-verify'),
                            'placeholder' => __('Enter only id', 'website-verify'),
                            'description' => sprintf(
                                __('If you havent registered for Pinterest Webmaster Verification Console, Go to %s Signup Here %s', 'website-verify'),
                                '<a target="_blank" href="http://pinterest.com/business/create">', '</a>'
                            ), 'type' => 'input'

                        ),
                        

            )
            
                    ),
            

                    'analytics_scripts' => array(
                        'title' => __('Analytics Scripts', 'website-verify'),
                        'instructions' => array(
                            'title' => __('Instructions', 'website-verify'),
                            'lists' => array(
                                ' Copy the script tags and paste in the text area : Example of script tag<br/>
                                <code>&lt; script &gt;
                                (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
                                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new
                                Date();a=s.createElement(o),
                                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                                })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');
                                ga(\'create\', \'UA-xxxxxx-1\', \'auto\');
                                ga(\'send\', \'pageview\');
                                &lt;/ script &gt;</code>',
                                ' You can add unlimited script tags in the text area',
                                ' Keep space between tags for readabilty purpose'
                            ),
                            'allowed_html' => array(
                                'br' => array(),
                                'code' => array(),
                            )
                        ),
                        'type' => 'section',
                        'fields' =>
                            array(
                                'analytics_scripts_field' => array(
                                    'parent_id' => 'website_verify_options',
                                    'title' => __('Analytics Scripts', 'website-verify'),
                                    'placeholder' => __('Enter script tags', 'website-verify'),
                                    'description' => sprintf(
                                        __('You can add comments to maintain redability like this: %s add comments %s', 'website-verify'),
                                        '/*', '/*'
                                    ),
                                    'type' => 'textarea'
                
                                )
                            ),
                    )
        ));

    }

    public function output()
    {
        self::render_output();
    }

}

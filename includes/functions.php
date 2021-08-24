<?php

if (!function_exists('website_verify_options')) {

    function website_verify_options()
    {
        return apply_filters('website_verify_options', get_option('website_verify_options'));

    }
}
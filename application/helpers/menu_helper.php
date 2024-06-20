<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('set_active')) {
    function set_active($uri) {
        $CI =& get_instance();
        return ($CI->uri->uri_string() == $uri) ? 'active' : '';
    }
}

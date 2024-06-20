<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('trim_text')) {
    function trim_text($text, $limit) {
        $words = explode(' ', $text);
        if (count($words) > $limit) {
            $trimmed_text = implode(' ', array_slice($words, 0, $limit)) . '...';
            return $trimmed_text;
        }
        return $text;
    }
}

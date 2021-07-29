<?php

//if(!function_exists('carbon_fields_register_fields')){
//    exit;
//}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( ABSPATH . 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

include_once( __DIR__ . '/post-meta.php');
include_once( __DIR__ . '/widget-meta.php');
include_once( __DIR__ . '/theme-options.php');

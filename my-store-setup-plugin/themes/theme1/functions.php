<?php
// themes/theme1/functions.php

function theme1_enqueue_styles()
{
    wp_enqueue_style('theme1-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.1', 'all');
    wp_enqueue_script('theme1-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'theme1_enqueue_styles');

function get_my_store_info()
{
    global $wpdb;

    // Table for storing shop information
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $store_info = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1"); // Adjust the condition as necessary

    return $store_info;
}

<?php
function restaurant_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'restaurant_theme_setup');

function restaurant_theme_enqueue_scripts()
{
    wp_enqueue_style('restaurant-style', get_stylesheet_uri());
    wp_enqueue_style('tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    wp_enqueue_script('restaurant-script', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'restaurant_theme_enqueue_scripts');

function get_my_store_info()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_store_shop_info';
    $store_info = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");
    return $store_info;
}

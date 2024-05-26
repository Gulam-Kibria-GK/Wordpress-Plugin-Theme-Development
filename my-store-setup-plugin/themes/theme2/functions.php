<?php
function theme1_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'theme1'),
    ));
}
add_action('after_setup_theme', 'theme1_setup');

function theme1_scripts()
{
    wp_enqueue_style('theme1-style', get_stylesheet_uri());
    wp_enqueue_script('theme1-script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'theme1_scripts');

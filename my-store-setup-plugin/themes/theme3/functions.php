<?php
/*
* My Theme Function
*/


// Theme Title
add_theme_support('title-tag');

// theme css and js file calling
function gk_css_js_calling()
{
    wp_enqueue_style('gk-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.0.2', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.6', 'all');
    wp_enqueue_style('custom');


    //js
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '5.0.2', true);
    // wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'gk_css_js_calling');


//google font
function gk_add_fonts()
{
    wp_enqueue_style('gk-google-font', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}

add_action('wp_enqueue_scripts', 'gk_add_fonts');


// Theme function
function gk_customizer_register($wp_customize)
{
    $wp_customize->add_section('gk_header_area', array(
        'title' => __('Header Area', 'gk'),
        'description' => 'if you want to change header area',

    ));

    $wp_customize->add_setting('gk_logo', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gk_logo', array(
        // 'label' => __('Logo', 'gk'),
        'label' => 'Logo upload here',
        'description' => 'if you want to change logo',
        'settings' => 'gk_logo',
        'section' => 'gk_header_area',

    )));

    // Menu Position Option
    $wp_customize->add_section('gk_menu_option', array(
        'title' => __('Menu Position Option', 'gk'),
        'description' => 'If you interested to change your menu position you can do it.'
    ));

    $wp_customize->add_setting('gk_menu_position', array(
        'default' => 'right_menu',
    ));

    $wp_customize->add_control('gk_menu_position', array(
        'label' => 'Menu Position',
        'description' => 'Select your menu position',
        'setting' => 'gk_menu_position',
        'section' => 'gk_menu_option',
        'type' => 'radio',
        'choices' => array(
            'left_menu' => 'Left Menu',
            'right_menu' => 'Right Menu',
        ),
    ));

    // Footer Option
    $wp_customize->add_section('gk_footer_option', array(
        'title' => __('Footer Option', 'gk'),
        'description' => 'If you interested to change or update your footer settings you can do it.'
    ));

    $wp_customize->add_setting('gk_copyright_section', array(
        'default' => '&copy; Copyright 2021 | All Right Reserved',
    ));

    $wp_customize->add_control('gk_copyright_section', array(
        'label' => 'Copyright Text',
        'description' => 'If need you can update your copyright text from here',
        'setting' => 'gk_copyright_section',
        'section' => 'gk_footer_option',
    ));
}

add_action('customize_register', 'gk_customizer_register');


register_nav_menu('main_menu', __('Main Menu', 'gk'));

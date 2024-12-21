<?php
/*
My Theme Function
*/

// Theme Title
add_theme_support('title-tag');

//Theme CSS and jQuery File calling
function absl_css_js_calling(){
    wp_enqueue_style('absl-style', get_stylesheet_uri());
    wp_register_style('absl-bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.3.3', 'all');
    wp_enqueue_style('absl-bootstrap');
    wp_register_style('absl-custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('absl-custom');

    //jQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('absl-bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.3.3', 'true');
    wp_enqueue_script('absl-main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true');
}
add_action('wp_enqueue_scripts', 'absl_css_js_calling');

// Theme Function for Logo
function absl_logo_customizer_register($wp_customize){
    $wp_customize->add_section('absl_header_area', array(
        'title' =>__('Header Area', 'absoftlab'),
        'description' => 'If you interested to update your headeer aria, you can do it here.'
    ));

    $wp_customize->add_setting('absl_logo', array(
        'default' => get_bloginfo('template_directory').'/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'absl_logo', array(
        'lable' => 'Logo Upload',
        'setting' => 'absl_logo',
        'section' => 'absl_header_area'
    )));
}

add_action('customize_register', 'absl_logo_customizer_register');

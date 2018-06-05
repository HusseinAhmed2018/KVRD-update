<?php

function KVRD2_resources_style(){

    wp_enqueue_style('bootstrap', get_template_directory_uri().'/asset/css/bootstrap.min.css');
    wp_enqueue_style('swiper', get_template_directory_uri().'/asset/css/swiper.min.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri().'/asset/css/fontawesome-all.min.css');
    wp_enqueue_style('reset', get_template_directory_uri().'/asset/css/reset.css');
    wp_enqueue_style('basics', get_template_directory_uri().'/asset/css/common.css');
    wp_enqueue_style('style', get_template_directory_uri().'/asset/css/style.css');
    wp_enqueue_style('flexslider', get_template_directory_uri().'/asset/css/flexslider.css');

}

add_action('wp_enqueue_scripts', 'KVRD2_resources_style');


#-------------------------SetUP-------------------------------
function KVRD_setup(){


    //Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail',200, 300,array('left', 'top'), true); //size of image
    add_image_size('banner-image', 920,210, array('left', 'top')); //size of image and postion

}

add_action('after_setup_theme', 'KVRD_setup');

add_image_size('medium',907,705, true);
add_image_size('small',250, 100, true);

/**
 * ACF Google Map Custom Field.
 */

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyCqQm3csno1ZhyxE0Ya7U6IKAe3Dot_EiM';

    return $api;

}

#-----------------------------Menu------------------------------
function add_menu(){
    register_nav_menus(array(
        'main' => 'Main Menu',
        'side' => 'side Menu',
    ));

}
add_action('init', 'add_menu');

function nav_menu(){
    wp_nav_menu(array(
        'menu' => 'main',
        'container_class'      => false,
    ));
}

add_filter('nav_menu_css_class', 'menu_item_classes', 10, 4);
//mainHover

function menu_item_classes( $classes, $item, $args, $depth ) {

//    unset($classes);
    if ( 'main Menu' === $args->menu ) {
        $classes[] = 'text-uppercase d-inline-block head-padding';
    }

    return $classes;
}

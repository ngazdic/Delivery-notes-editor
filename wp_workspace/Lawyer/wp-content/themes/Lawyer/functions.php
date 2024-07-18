<?php

//Sa ove dve funkcije ispod ukljucjemo linkove za css i js:
//css
function lawyer_style() {
    //prvo ide ime, pa url, pa da li ima dependencies, pa verzija
    wp_enqueue_style('Owl Carousel', get_template_directory_uri() . '/frontend/css/owl.carousel.css', array(), '1.0');
    wp_enqueue_style('Owl Carousel Theme', get_template_directory_uri() . '/frontend/css/owl.theme.default.css', array('Owl Carousel'), '1.0');
    wp_enqueue_style('Theme', get_template_directory_uri() . '/frontend/css/theme.css', array(), '1.0');
    wp_enqueue_style('Style', get_template_directory_uri() . '/style.css', array(), '1.0');
}

add_action('wp_enqueue_scripts', 'lawyer_style');

//js
function lawyer_scripts() {
    wp_enqueue_script('jQuery', get_template_directory_uri() . '/frontend/js/jquery.min.js', array(), '3.4.1', true); //true znaci da ce biti na dnu fajla
    wp_enqueue_script('Bootstrap Bundle', get_template_directory_uri() . '/frontend/js/bootstrap.bundle.min.js', array('jQuery'), '4.3.1', true);
    wp_enqueue_script('Font Awesome', 'https://kit.fontawesome.com/f4353abedd.js', array(), '6', true);
    wp_enqueue_script('Owl Carousel', get_template_directory_uri() . '/frontend/js/owl.carousel.min.js', array('jQuery'), '2.3.4', true);
    wp_enqueue_script('Main JS', get_template_directory_uri() . '/frontend/js/main.js', array(''), '1.0', true);
}

add_action('wp_enqueue_scripts', 'lawyer_scripts');

function lawyer_support() {
    //title tag suport
    add_theme_support('title-tag');

    add_theme_support('custom-logo', array(
        'height' => 28,
        'width' => 88,
        'flex-width' => false,
        'flex-height' => false
    ));
    //feature-image-support
    add_theme_support('post-thumbnails');

    // image size support

    add_image_size('news-list', 463, 307, true); //true znaci da omogucavamo kropovanje a ova ostala dva su dimenzije


    add_image_size('team-list', 273, 355, true);
    add_image_size('single_team', 558, 725, true);
}

add_action('after_setup_theme', 'lawyer_support');

function lawyer_menus() {
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
        'social' => 'Social Menu'
    ));
}

add_action('init', 'lawyer_menus');

function lawyer_create_post_type() {

    register_post_type('our-services', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name ' => 'Service',
            'plural_name' => 'Services',
            'all_items' => 'All Services',
            'add_new' => 'Add New Service',
            'add_new_item' => 'Add New Service Item',
            'new_item' => 'New Service',
            'edit' => 'Edit',
            'edit_item' => 'Edit Service Item',
            'view' => 'View Service',
            'view_item'=>'View Service Item',
            'featured_image'=>'Featured Image for this service'
            
        ),
        
        
        'public' => true,
        'hierarchical'=> false,
        'menu_icon' => 'dashicons-admin-generic',
        'menu_position'=>17,
        'supports' => array(
            
            'title',
            'thumbnail',
            'editor'
            
        )
        
        
    ));
}

add_action('init', 'lawyer_create_post_type');

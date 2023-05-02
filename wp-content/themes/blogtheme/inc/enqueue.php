<?php 

function theme_scripts()

{
    // wp_enqueue_style('custom_style', get_theme_file_uri('/css/navbar.css'));
    wp_enqueue_style('theme_style', get_theme_file_uri('/css/index.css'));
    wp_enqueue_style('custom_style', get_theme_file_uri('/css/custom.css'));
    // wp_enqueue_script('jquery');
    // wp_enqueue_script('theme_js',get_theme_file_uri('/js/theme.js'),array(),true);
    // wp_enqueue_script('set_javascpt', get_theme_file_uri('/js/accord.js'));
    // wp_enqueue_script('accord_set','//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'); 
    // wp_enqueue_script('set_main_javascpt','//cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js'); 
    // wp_enqueue_script('set_javascpt','//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js');
    
}
add_action ('wp_enqueue_scripts','theme_scripts');


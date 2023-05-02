<?php

function theme_register_menus(){ 
    register_nav_menus(array(
        // 'main-menu' => esc_html__('Main-menu','theme')
        'primary' => esc_html__( 'Primary Menu', 'theme' ),
    ));
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
      
        add_theme_support('custom-logo', array(
            'height'=>200,
            'width'=> 600,
            'flex-height'=> true,
            'flex-width'=> true
    ));

    // add_editor_style('style.css');
}
function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}


add_action('after_setup_theme','theme_register_menus');

// function register_navwalker(){
// 	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
// }
// add_action( 'after_setup_theme', 'register_navwalker' );

function theme_enqueue_block_styles(){
    wp_enqueue_block_style('core/group',array(

        'handle'=>'theme-block-group',
        'src'=> get_theme_file_uri('/css/core-group.css'),
        'path'=> get_theme_file_path('/css/core-group.css')

    ));
}

add_action ('init','theme_enqueue_block_styles');

// Register a slider block.
add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('A custom slider block.'),
            'render_template'   => 'template-parts/blocks/slider/slider.php',
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'align'             => 'full',
            'enqueue_assets'    => function(){
                wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
                wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
                // wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

                wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.css', array(), '1.0.0' );
                wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.js', array(), '1.0.0', true );
              },
        ));
    }
}









require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/customize.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/shortcodes.php';
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

<?php
/*
Plugin Name: GT- Image Slider
Plugin URI: https://thedistillery.co
description:  Image Text slider plugin for a block containing multiple rows of image and text on single row with alignment settings. It also contains header & CTA
Version: 0.1
Author: #
Author URI: #
License: GPL2
*/

define('GT_IMAGETEXT_PLUGIN_DIR', plugin_dir_path(__FILE__));

/**
 * Defines an ACF block load json file which defines the standard use of this block
 * It acts as a base config load for this block definition
 *
 * @param $paths
 * @return mixed
 */
function gt_slider_acf_json_load_point( $paths ) {
	$paths[] = GT_IMAGETEXT_PLUGIN_DIR . '/conf';
	return $paths;
}
add_filter('acf/settings/load_json', 'gt_slider_acf_json_load_point');

/**
 * Defines the custom Block types for this plugin
 * Note: that only common block types should be defined here. Plugins should be used to define bespoke blocks.
 */
function gt_slider_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        acf_register_block_type(array(
            'name'              => 'GT - Image Slider with CTA',
            'title'             => __('GT - Image Text'),
            'description'       => __('Image slider with call to action buttons'),
            'render_template'   => plugin_dir_path(__FILE__) . '/block.php',
            'category'          => 'formatting',
            'icon'              => 'id',
            'align'             => 'full',
            'mode'              => 'edit',
            'keywords'          => array( 'image', 'content' ),
            'enqueue_assets' => function () {
                wp_enqueue_style('slick', plugin_dir_url(__FILE__).'/resource/slick.css');
                wp_enqueue_style('slick-theme', plugin_dir_url(__FILE__).'resource/slick-theme.css');
                wp_enqueue_script('slick-js', plugin_dir_url(__FILE__).'/resource/slick.js');

            }
        ));
    }
}
add_action('acf/init', 'gt_slider_acf_init_block_types');


<?php
/*
Plugin Name: Elfsight Testimonials Slider
Description: Level up your website credibility with trustworthy testimonials
Plugin URI: https://elfsight.com/testimonials-slider-widget/wordpress/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=testimonials-slider&utm_content=plugin-site
Version: 1.0.1
Author: Elfsight
Author URI: https://elfsight.com/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=testimonials-slider&utm_content=author-url
*/

if (!defined('ABSPATH')) exit;


require_once('core/elfsight-plugin.php');

$elfsight_testimonials_slider_config_path = plugin_dir_path(__FILE__) . 'config.json';
$elfsight_testimonials_slider_config = json_decode(file_get_contents($elfsight_testimonials_slider_config_path), true);

new ElfsightTestimonialsSliderPlugin(array(
        'name' => 'Testimonials Slider',
        'description' => 'Level up your website credibility with trustworthy testimonials',
        'slug' => 'elfsight-testimonials-slider',
        'version' => '1.0.1',
        'text_domain' => 'elfsight-testimonials-slider',
        'editor_settings' => $elfsight_testimonials_slider_config['settings'],
        'editor_preferences' => $elfsight_testimonials_slider_config['preferences'],
        'script_url' => plugins_url('assets/elfsight-testimonials-slider.js', __FILE__),

        'plugin_name' => 'Elfsight Testimonials Slider Lite',
        'plugin_file' => __FILE__,
        'plugin_slug' => plugin_basename(__FILE__),

        'menu_icon' => plugins_url('assets/img/menu-icon.png', __FILE__),

        'preview_url' => plugins_url('preview/index.html', __FILE__),
        'observer_url' => plugins_url('preview/testimonials-slider-observer.js', __FILE__),

        'product_url' => 'https://elfsight.com/testimonials-slider-widget/?utm_source=markets&utm_medium=wordpress-org&utm_content=adminpanel&utm_campaign=testimonials-slider-lite&utm_term=upgradetopro',
        'product_review_url' => 'https://wordpress.org/plugins/elfsight-testimonials-slider/#reviews',
        'support_url' => 'https://wordpress.org/support/plugin/elfsight-testimonials-slider',
    )
);

?>
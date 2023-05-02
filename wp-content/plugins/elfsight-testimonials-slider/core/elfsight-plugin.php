<?php

if (!defined('ABSPATH')) exit;

require_once(plugin_dir_path(__FILE__) . '/includes/widgets-api.php');
require_once(plugin_dir_path(__FILE__) . '/includes/admin.php');

if (!class_exists('ElfsightTestimonialsSliderPlugin')) {
    class ElfsightTestimonialsSliderPlugin {
        private $name;
        private $slug;
        private $version;
        private $textDomain;
        private $editorSettings;
        private $scriptUrl;

        private $pluginFile;
        private $pluginSlug;

        private $widgetsApi;
        private $admin;

        private $isShortcodePresent;

        public function __construct($config) {
            $this->name = $config['name'];
            $this->slug = $config['slug'];
            $this->version = $config['version'];
            $this->textDomain = $config['text_domain'];
            $this->editorSettings = $config['editor_settings'];
            $this->scriptUrl = $config['script_url'];

            $this->pluginFile = $config['plugin_file'];
            $this->pluginSlug = $config['plugin_slug'];

            $this->widgetsApi = new ElfsightTestimonialsSliderWidgetsApi($this->slug, $this->pluginFile, $this->textDomain);
            $this->admin = new ElfsightTestimonialsSliderPluginAdmin($config, $this->widgetsApi);

            add_action('wp_footer', array($this, 'printAssets'));
            add_shortcode(str_replace('-', '_', $this->slug), array($this, 'addShortcode'));
            add_action('plugin_action_links_' . $this->pluginSlug, array($this, 'addPluginActionLinks'));
        }

        public function printAssets() {
            $force_script_add = get_option($this->getOptionName('force_script_add'));

            wp_register_script($this->slug, $this->scriptUrl, array(), $this->version);

            if ($this->isShortcodePresent || $force_script_add === 'on') {
                wp_print_scripts($this->slug);
            }
        }

        public function recursiveDefaults($properties, $defaults){
            foreach($properties as $property) {
                if ($property['type'] == 'subgroup') {
                    $defaults = $this->recursiveDefaults($property['subgroup']['properties'], $defaults);
                } else {
                    if (!empty($property['id'])) {
                        $defaults[$property['id']] = !empty($property['defaultValue']) ? $property['defaultValue'] : null;
                    }
                }
            }

            return $defaults;
        }

        public function addShortcode($atts) {
            $this->isShortcodePresent = true;

            $atts = $atts ? $this->formatAtts($atts) : $atts;
            $widget_id = !empty($atts['id']) ? $atts['id'] : null;

            $defaults = array();
            $defaults = $this->recursiveDefaults($this->editorSettings['properties'], $defaults);

            if (!empty($widget_id)) {
                $widget_options = $this->getWidgetOptions($widget_id);

                if (!$widget_options) {
                    return '';
                }

                $atts = array_combine(
                    array_merge(array_keys($widget_options), array_keys($atts)),
                    array_merge(array_values($widget_options), array_values($atts))
                );

                unset($atts['id']);
            }

            $options = shortcode_atts($defaults, $atts, str_replace('-', '_', $this->slug));
            $options = apply_filters($this->getOptionName('shortcode_options'), $options, $widget_id);

            $options_string = rawurlencode(json_encode($options));

            $result = '<div class="elfsight-widget-' . str_replace('elfsight-', '', $this->slug) . ' elfsight-widget" data-' . $this->slug . '-options="' . $options_string . '"></div>';

            return $result;
        }

        public function formatAtts($atts){
            if (!function_exists('dashesToCamelCase')) {
                function dashesToCamelCase($string, $capitalizeFirstCharacter = false) {
                    $string = preg_replace_callback('/_[a-zA-Z]/', 'capitalize', $string);
                    $string = preg_replace_callback('/-[a-zA-Z]/', 'capitalize', $string);

                    return $string;
                }
            }

            if (!function_exists('capitalize')) {
                function capitalize($matches) {
                    return strtoupper($matches[0][1]);
                }
            }

            foreach ($atts as $key => $value) {
                $atts[dashesToCamelCase($key)] = $value;
            }

            return $atts;
        }

        public function addPluginActionLinks($links) {
            $links[] = '<a href="' . esc_url(admin_url('admin.php?page=' . $this->slug)) . '">Settings</a>';
            $links[] = '<a href="http://codecanyon.net/user/elfsight/portfolio?ref=Elfsight" target="_blank">More plugins by Elfsight</a>';

            return $links;
        }

        private function getWidgetOptions($id) {
            global $wpdb;

            $id = intval($id);

            $widgets_table_name = $this->widgetsApi->getTableName();
            $select_sql = '
            SELECT options FROM `' . esc_sql($widgets_table_name) . '`
            WHERE `id` = "' . esc_sql($id) . '" and `active` = "1"
        ';

            $item = $wpdb->get_row($select_sql, ARRAY_A);

            if (!empty($item) && !empty($item['options'])) {
                $options = json_decode($item['options'], true);
            }
            else {
                $options = null;
            }

            return $options;
        }

        private function getOptionName($name) {
            return str_replace('-', '_', $this->slug) . '_' . $name;
        }
    }
}
?>
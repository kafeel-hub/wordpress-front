<?php

if (!defined('ABSPATH')) exit;

if (!class_exists('ElfsightTestimonialsSliderPluginAdmin')) {
    class ElfsightTestimonialsSliderPluginAdmin {
        private $name;
        private $description;
        private $slug;
        private $version;
        private $textDomain;
        private $editorSettings;
        private $editorPreferences;
        private $menuIcon;
        private $menuId;

        private $pluginName;
        private $pluginFile;

        private $previewUrl;
        private $observerUrl;

        private $productUrl;
        private $productReviewUrl;
        private $supportUrl;

        private $widgetsApi;

        private $capability;

        private $pages;
        private $customPages;
        private $menu;

        public function __construct($config, $widgetsApi) {
            $this->name = $config['name'];
            $this->description = $config['description'];
            $this->slug = $config['slug'];
            $this->version = $config['version'];
            $this->textDomain = $config['text_domain'];
            $this->editorSettings = $config['editor_settings'];
            $this->editorPreferences = $config['editor_preferences'];
            $this->menuIcon = $config['menu_icon'];

            $this->pluginName = $config['plugin_name'];
            $this->pluginFile = $config['plugin_file'];

            $this->previewUrl = $config['preview_url'];
            $this->observerUrl = !empty($config['observer_url']) ? $config['observer_url'] : null;

            $this->productUrl = $config['product_url'];
            $this->productReviewUrl = $config['product_review_url'];
            $this->supportUrl = $config['support_url'];

            $this->customPages = !empty($config['admin_custom_pages']) ? $config['admin_custom_pages'] : array();
            $this->pages = $this->generatePages();
            $this->menu = $this->generateMenu();

            $this->widgetsApi = $widgetsApi;

            add_action('admin_menu', array($this, 'addMenuPage'));
            add_action('admin_init', array($this, 'registerAssets'));
            add_action('admin_enqueue_scripts', array($this, 'enqueueAssets'));

            add_action('wp_ajax_' . $this->getOptionName('rating_send'), array($this, 'sendRating'));

            $this->capability = apply_filters('elfsight_admin_capability', 'manage_options');
        }

        public function addMenuPage() {
            $this->menuId = add_menu_page($this->name, $this->name, $this->capability, $this->slug, array($this, 'getPage'), $this->menuIcon);
        }

        public function registerAssets() {
            wp_register_style($this->slug . '-admin', plugins_url('assets/elfsight-admin.css', $this->pluginFile), array(), $this->version);
            wp_register_script($this->slug . '-admin', plugins_url('assets/elfsight-admin.js', $this->pluginFile), array(), $this->version, true);
        }

        public function enqueueAssets($hook) {
            if ($hook && $hook == $this->menuId) {
                wp_enqueue_style($this->slug . '-admin');
                wp_enqueue_script($this->slug . '-admin');

                // remove emoji
                remove_action('wp_head', 'print_emoji_detection_script', 7);
                remove_action('wp_print_styles', 'print_emoji_styles');
                remove_action('admin_print_scripts', 'print_emoji_detection_script');
                remove_action('admin_print_styles', 'print_emoji_styles');
            }
        }

        public function getPage() {
            $this->widgetsApi->upgrade();

            $widgets_clogged = get_option($this->getOptionName('widgets_clogged'), '');

            ?>
            <div class="elfsight-admin wrap">
                <h2 class="elfsight-admin-wp-notifications-hack"></h2>

                <div class="elfsight-admin-wrapper">
                    <?php require_once(plugin_dir_path(__FILE__) . implode(DIRECTORY_SEPARATOR, array('templates', 'header.php'))); ?>

                    <main class="elfsight-admin-main elfsight-admin-loading"
                          data-elfsight-admin-slug="<?php echo $this->slug; ?>"
                          data-elfsight-admin-widgets-clogged="<?php echo $widgets_clogged; ?>">
                        <div class="elfsight-admin-loader"></div>

                        <div class="elfsight-admin-menu-container">
                            <?php require_once(plugin_dir_path(__FILE__) . implode(DIRECTORY_SEPARATOR, array('templates', 'menu.php'))); ?>

                            <?php require_once(plugin_dir_path(__FILE__) . implode(DIRECTORY_SEPARATOR, array('templates', 'menu-actions.php'))); ?>
                        </div>

                        <div class="elfsight-admin-pages-container">
                            <?php
                            foreach ($this->pages as $page) {
                                require_once($page['template']);
                            }
                            ?>
                        </div>
                    </main>

                    <?php
                    if (!get_option($this->getOptionName('rating_sent'))) {
                        require_once(plugin_dir_path(__FILE__) . implode(DIRECTORY_SEPARATOR, array('templates', 'popup-rating.php')));
                    }
                    ?>
                </div>
            </div>
        <?php }

        public function sendRating() {
            if (!wp_verify_nonce($_REQUEST['nonce'], $this->getOptionName('rating_send'))) {
                exit;
            }

            $headers = 'From: ' . $_SERVER['SERVER_NAME'] . ' <' . get_option('admin_email') .'>' . "\r\n";
            $headers .= 'Reply-To: ' . get_option('admin_email') . "\r\n";
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            $value = $_REQUEST['value'];
            $comment = $_REQUEST['comment'];

            $text = ($value === '5') ? '<h1 style="color: green;">Hoooray!</h1>' : '<h1 style="color: red;">Warning!</h1>';

            $text .= '<p>New ';
            $text .= ($value === '5') ? '<b style="font-size: 24px; color: green;">' . $value . ' stars</b>' : '<b style="font-size: 24px; color: red;">' . $value . ' stars</b>';
            $text .= ' rating for ' . $this->pluginName . ' on wordpress.org</p><br><p>From ' . get_option('admin_email') . ' (' . get_option('siteurl') . ')</p>';

            if (!empty($comment)) {
                $text .= '
                    <p>With comment:</p>
                    <blockquote><p>' . $comment . '</p></blockquote>';
            }

            if ($value === '5') {
                $text .= '
                    <hr>
                    <p>Check rating on wordpress.org <a href="' . $this->productReviewUrl . '" target="_blank" rel="nofollow">' . $this->productReviewUrl . '</a></p>';
            }

            add_option($this->getOptionName('rating_sent'), 'true');
            wp_mail('support@elfsight.com', 'New rating for wordpress.org', $text, $headers);
        }

        private function getOptionName($name) {
            return str_replace('-', '_', $this->slug) . '_' . $name;
        }

        private function generatePages() {
            $plugin_dir = plugin_dir_path(__FILE__);
            $default_pages = array(
                array(
                    'id' => 'welcome',
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-welcome.php'))
                ),
                array(
                    'id' => 'widgets',
                    'menu_title' => 'Widgets',
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-widgets.php'))
                ),
                array(
                    'id' => 'edit-widget',
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-edit-widget.php'))
                ),
                array(
                    'id' => 'support',
                    'menu_title' => 'Support',
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-support.php'))
                ),
                array(
                    'id' => 'error',
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-error.php'))
                )
            );

            return array_merge($default_pages, $this->customPages);
        }

        private function generateMenu() {
            $menu = array();

            foreach ($this->pages as $page) {
                if (!empty($page['menu_title'])) {
                    array_splice($menu, isset($page['menu_index']) ? $page['menu_index'] : count($this->pages), 0, array($page));
                }
            }

            return $menu;
        }
    }
}?>
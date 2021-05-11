<?php
defined('ABSPATH') or exit;

/*
* Main Class of the plugin
*/

if (!class_exists('getUserData')) {
    class getUserData
    {
        private $menuName       =   'Api Users Data';
        private $menuIcon       =   'dashicons-media-default';
        private $menuPosition   =   25;

        public function __construct($url)
        {
            add_action('admin_menu', array($this, 'apidata_register_menu'));
            add_action('wp_enqueue_scripts', array($this, 'apidata_enqueue_style'));
            add_action('wp_enqueue_scripts', array($this, 'apidata_enqueue_script'));
            if (isset($_GET['page']) and $_GET['page'] == urldecode($url)) {
                add_action('admin_enqueue_scripts', array($this, 'apidata_admin'));
            }
        }


        /**
         * Register a custom menu on admin page.
         * define in constructor
         */
        public function apidata_register_menu()
        {
            $x              =   explode("plugins", apidata_plugin_url);
            $pluginPerma    =   wp_unslash($x[1]) . '/get-data.php';
            add_menu_page(
                __('Custom Menu Title', ''),
                $this->menuName,
                'manage_options',
                $pluginPerma,
                '',
                $this->menuIcon,
                $this->menuPosition
            );
        }

        /**
         * Use on fornt end
         */
        public static function apidata_enqueue_style()
        {
            wp_enqueue_style('apidata-css', apidata_url . 'plugin/css/apidata-style.css', false);
        }
        public static function apidata_enqueue_script()
        {
            wp_enqueue_script('jquery');
            wp_enqueue_script('apidata-js', apidata_url . 'plugin/css/apidata-function.js', false);
        }

        /**
         * Use in plugin backend
         */
        public static function apidata_admin()
        {
            //All compulsory style sheets are added.
            wp_register_style('apidata-inpsyde-css', apidata_url . 'css/apidata.css', false, '1.0.0');
            wp_register_style('cb-css', apidata_url . 'colorbox/colorbox.css', false, '1.0.0');

            wp_enqueue_style('cb-css');
            wp_enqueue_style('apidata-inpsyde-css');

            //All compulsory scripts are added
            wp_register_script('apidata-inpsyde-js', apidata_url . 'js/apidata.js', array('jquery'), '', true);
            wp_register_script('cb-js', apidata_url . 'colorbox/jquery.colorbox-min.js', array('jquery'), '', true);

            wp_enqueue_script('cb-js');
            wp_enqueue_script('apidata-inpsyde-js');
        }
    }
}

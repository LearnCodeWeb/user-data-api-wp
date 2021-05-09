<?php
defined('ABSPATH') or exit;
/**
 * Plugin Name
 *
 * @package           Inpsyde/Users
 * @author            Khalid Zaid Bin
 * @copyright         2021 LearnCodeWeb
 * @license           MIT
 *
 * @wordpress-plugin
 * Plugin Name:       Get Data With API
 * Plugin URI:        https://github.com/LearnCodeWeb/get-data-from-api-wp
 * Description:       In this plugin you can get any data from other endpoint with valid access and dispaly into your main website. This plugin will give you the shortcode that you can use to show data into the tabuler form.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Khalid Zaid Bin
 * Author URI:        https://learncodeweb.com
 * Text Domain:       /learncodeweb/
 * License:           MIT
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

include_once('url_path_config.php');

/*
* Main Class of the plugin
*/

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


new getUserData($url[1]);

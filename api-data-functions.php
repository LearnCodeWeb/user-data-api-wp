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
* Main functions files
*/

// register menu
function apidata_register_menu()
{
    /**
     * Register a custom menu page.
     */
    function apidata_menu_page()
    {
        $x    =    explode("plugins", apidata_plugin_url);
        $pluginPerma    = wp_unslash($x[1]) . '/get-data.php';
        add_menu_page(
            __('Custom Menu Title', ''),
            'Api Users Data',
            'manage_options',
            $pluginPerma,
            '',
            'dashicons-media-default',
            25
        );
    }
    add_action('admin_menu', 'apidata_menu_page');
}
add_action('init', 'apidata_register_menu');


function apidata_shortcode($atts)
{
    extract(
        shortcode_atts(
            array(
                'btntitle' => 'Preview PDF',
                'class' => 'btn-pdf',
                'title' => 'PDF Viewer',
                'link' => 'javascript:void(0);',
                'id' => 'PDF ID Missing',
                'target' => '_blank',
            ),
            $atts
        )
    );
    return 'table data';
}
add_shortcode('apidata_shortcode', 'apidata_shortcode');

//Use on fornt end
function apidata_enqueue_style()
{
    wp_enqueue_style('apidata-css', apidata_url . 'plugin/css/apidata-style.css', false);
}

function apidata_enqueue_script()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('apidata-js', apidata_url . 'plugin/css/apidata-function.js', false);
}

add_action('wp_enqueue_scripts', 'apidata_enqueue_style');
add_action('wp_enqueue_scripts', 'apidata_enqueue_script');


//Use in plugin backend
function apidata_admin()
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
//only add in admin panel
if (isset($_GET['page']) and $_GET['page'] == urldecode($url[1])) {
    add_action('admin_enqueue_scripts', 'apidata_admin');
}

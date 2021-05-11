<?php

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

include_once('vendor/autoload.php');
include_once('url_path_config.php');

$pluginFileURL =   isset($url[1]) ? $url[1] : 'user-data-api-wp/get-data.php
';

new getUserData($pluginFileURL);

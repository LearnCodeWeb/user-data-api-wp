<?php
error_reporting(0);
$version        =   "1.0.0";
$authorName     =   'Zaid';

define('apidata_url', plugin_dir_url(__FILE__));
define('apidata_path', dirname(__FILE__));
define('apidata_plugin_url', rtrim(plugin_dir_path(__FILE__), '/'));


$apidataPath   =   explode("wp-content", apidata_path);
$apidataUrl    =   explode("wp-content", apidata_url);

define('apidata_root_path', $apidataPath[0]);
define('apidata_root_url', $apidataUrl[0]);
$url    =    explode("=", $_SERVER['QUERY_STRING']);


/*
* API URL
*/
define('apiurl', 'http://localhost/userapi/');

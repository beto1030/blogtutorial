<?php 
/*
 * Basic Site Settings and Database Configuration
 */

// Site Settings
$siteName = "codingwbeto";
$siteEmail = "support@codingwbeto.com";

$siteURL = ($_SERVER["HTTPS"] == "on")?"https://":"http://";
$siteURL = $siteURL.$_SERVER["SERVER_NAME"].":8888".dirname($_SERVER["REQUEST_URI"])."/";

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'codingwbeto');

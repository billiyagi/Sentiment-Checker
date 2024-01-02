<?php

/** 
 * Php Configuration
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** 
 * Load Vendors Composer
 */
require __DIR__ . '/vendor/autoload.php';

/** 
 * Load Dotenv Library
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

/** 
 * Load Helper
 */
require_once(__DIR__ . '/app/helper/view.php');
require_once(__DIR__ . '/app/helper/url.php');

/** 
 * Load All Classes File
 */
spl_autoload_register(function ($class) {

	// Convert namespace to file path
	$classPath = str_replace('\\', "/", $class);

	// Call the class file
	require_once(__DIR__ . '/' . $classPath . '.php');
});



// Inintialize Request Module Class (singleton)
use App\Modules\RequestModule;

$request = new RequestModule();

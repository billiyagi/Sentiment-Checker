<?php

// Config
require_once(__DIR__ . '/app/config/Database.php');
require_once(__DIR__ . '/app/helper/view.php');
require_once(__DIR__ . '/app/helper/url.php');

// Autoload Module Class
spl_autoload_register(function ($class) {
	// Convert namespace to file path
	$classPath = str_replace('\\', "/", $class);

	// Call the class file
	require_once(__DIR__ . '/' . $classPath . '.php');
});


use App\Modules\RequestModule;

// Inintialize Class
$request = new RequestModule();

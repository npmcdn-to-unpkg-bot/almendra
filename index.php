<?php

// namespace Almendra\Core;

/**
 *
 * Initialization script.
 * 
 * briew description
 *
 * @author Richard Trujillo <richard@palmerastudios.com>
 *
 */

/**
 * Initialize environment variables.
 */

// server path (var/www/html/almendra)
define ('APP_PATH', dirname(__FILE__));

// app folder, relative to web root (/almendra)
define ('APP_FOLDER', dirname($_SERVER['SCRIPT_NAME']));

// url path to the app (http://dev.palmera/almendra)
define ('APP_URI', remove_unwanted_slashes('http://' . $_SERVER['SERVER_NAME'] . '/' . APP_FOLDER . '/'));

// server path to the system folder
define ('SYS_PATH', APP_PATH . '/dist');

// relative path to the form processing script (almendra/process.php)
define ('FORM_ACTION', remove_unwanted_slashes(APP_FOLDER . '/process.php'));



/**
 *
 * Initialize the App.
 *
 */

// start the session
if (!isset($_SESSION)) {
	session_start();
}

// load the configuration variables
require_once SYS_PATH . '/config/config.inc.php';

// turn on error reporting if in debug mode
if (DEBUG === true) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL^E_STRICT);
} else {
	ini_set('display_errors', 0);
}


// set the timezone (avoids a notice)
date_default_timezone_set(APP_TIMEZONE);


// register class_loader() as the autoloader function
//spl_autoload_register('class_autoloader');
require_once __DIR__ . '/bootstrap/app.php';



// -------------------------------------------------------

// 1. routing
// 2. once the route is resolved, call the controller

/**
 *
 * loads and processes view data
 *
 */
// parse the URI
$uri_array = parse_uri();
$class_name = get_controller_classname($uri_array);
$options = $uri_array;

// set a default view if nothing is passed in the URI (i.e. on the home page)
if (empty($class_name)) {
	$class_name = '\Almendra\Controllers\Home';
} else {
	// resolve path
	// @todo path resolver class
	$class_name = "\Almendra\Controllers\\" .  $class_name;
}

// initialize the requested view, or else throws a 404 error
try {
	//$controller = new {"Almendra\Controllers\\$class_name"}($options);
	$controller = new $class_name($options);

} catch (Exception $e) {
	$options[1] = $e -> getMessage();
	$controller = new Almendra\Controllers\ErrorView($options);
	//throw new Exception($options[1], 1);
	

}

/**
 *
 * Outputs the view.
 *
 * includes the header, requested view, and footer markup
 */

// loads the <title> tag for the header markup
$title = $controller -> get_title();

// sets the path to the app stylesheet for the header markup
//$dirty_path = APP_URI . '/assets/styles/main.css';
$dirty_path = APP_URI . '/assets';
$assets_path = remove_unwanted_slashes($dirty_path);

require_once SYS_PATH . '/inc/header.inc.php';

$controller -> output_view();

require_once SYS_PATH . '/inc/footer.inc.php';



// -------------------------------------------------------

/**
 *
 * Breaks the URI into an array.
 * @return array The broken up URI
 */
function parse_uri() {
	// remove any subfolders in which the app is intalled
	$real_uri = preg_replace(
		'~^' . APP_FOLDER . '~',
		'', 
		$_SERVER['REQUEST_URI'],
		1
		);

	$uri_array = explode('/', $real_uri);

	// if the first element is empty, get rid of it
	if (empty($uri_array[0])) {
		array_shift($uri_array);
	}

	// if the last element is empty, get rid of it
	if (empty($uri_array[count($uri_array) - 1])) {
		array_pop($uri_array);
	}

	return $uri_array;
}

/**
 *
 * Determinates the controller name using the first element of the URI array
 *
 * @param $uri_array array 	The broken up URI
 * @return string 			The controller classname
 */
function get_controller_classname(&$uri_array) {
	$controller = array_shift($uri_array);
	
	return ucfirst($controller);
}





/**
 *
 * Removes unwanted double slashes (except in protocol)
 *
 * @param $dirty_path string 	The path to check for unwanted slashes
 * @return string 				The cleaned path
 */
function remove_unwanted_slashes($dirty_path) {
	return preg_replace('~(?<!:)//~', '/', $dirty_path);
}



// -------------------------------------------------------

// @todo Replace this autoloader with composer autoloader

/**
 *
 * Autoloader
 * 
 * @param $class_name string 	The name of the class to be loaded
 * @return bool 				Returns true on success (Exception on faiure)
 */
function class_autoloader($class_name) {
	$file_name = strtolower($class_name);

	// define all valid places where a class file could be stored
	$possible_locations = [
		SYS_PATH . '/models/class.' . $file_name . '.inc.php',
		SYS_PATH . '/controllers/class.' . $file_name . '.inc.php',
		SYS_PATH . '/core/class.' . $file_name . '.inc.php',
		];

	// loop through the location array and check for a file to load
	foreach ($possible_locations as $location) {
		if (file_exists($location)) {
			require_once $location;

			return true;
		}
	}

	// fails because a valid class wasn't found
	throw new Exception("Class $class_name wasn't found.");

}



/**
 *
 * Display App environmental values.
 *
 */
function echoEnv() {
	echo 'Values: '. '<br>';;
	echo "APP_PATH: " . APP_PATH . '<br>';
	echo 'APP_FOLDER: ' . APP_FOLDER . '<br>';
	echo 'APP_URI: ' . APP_URI . '<br>';
	echo 'FORM_ACTION: ' . FORM_ACTION . '<br>';

}
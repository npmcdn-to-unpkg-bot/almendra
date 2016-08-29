<?php

/**
 *
 * Configuration sample
 * 
 * briew description
 *
 * @author Richard Trujillo <richard@palmerastudios.com>
 *
 */

/**
 * @var array
 */
$_CONSTANTS = [];

/**
 *
 * Configuration options
 *
 */
$_CONSTANTS['APP_TIMEZONE'] = 'US/Pacific';

// database credentials
$_CONSTANTS['DB_HOST'] = 'localhost';
$_CONSTANTS['DB_PORT'] = '3306';
$_CONSTANTS['DB_DATABASE'] = 'almendra';
$_CONSTANTS['DB_USERNAME'] = 'root';
$_CONSTANTS['DB_PASSWORD'] = 'secret';

// enable debug mode (strict error reporting)
$_CONSTANTS['DEBUG'] = true;



/**
 *
 * Convert the array into constants
 *
 */
foreach ($_CONSTANTS as $constant => $value) {
	define ($constant, $value);
}

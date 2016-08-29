<?php

/**
 * Creates a series of generic database interaction methods
 *
 * @package Core	
 * @author 	Richard Trujillo 	<richard@e-quilibrium.com>
 */
abstract class Model {
	public static $database;

	/**
	 * Creates a PDO connection to MySQL
	 *
	 * @return boolean 				Returns true on success (dies on failure)
	 */	
	function __construct() {
		$dsn = 'mysql:dbname=' . DB_DATABASE . ';host=' . DB_HOST;
		
		try {
			self::$database = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
		} catch (PDOException $e) {
			die ("Could not connect to the database.");
		}

		return true;
	}
}
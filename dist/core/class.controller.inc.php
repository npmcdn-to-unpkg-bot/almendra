<?php

//namespace Almendra\Core;

/**
 * An abstract class that lays the groundwork for all controllers.
 *
 * @package Core	
 * @author 	Richard Trujillo 	<richard@e-quilibrium.com>
 */
abstract class Controller {

	public $actions = [];
	public $model;

	protected static $nonce = null;

	/**
	 * Initializes the view.
	 *
	 * @param array $options 		Options for the view
	 * @return void 				
	 */
	function __construct($options) {
		if (!is_array($options)) {
			throw new Exception("No options were supplied for the room.");
		}
	}

	/**
	 * Generates the nonce that helps prevent XSS and duplicate submission.
	 *
	 * @return string 				The generated nonce
	 */
	protected function generate_nonce() {
		// todo: nonce generation script
		return "tempnonce";
	}

	/**
	 * Performs basic input sanitization on a given string.
	 *
	 * @param string $dirty 		The string to be sanitized
	 * @return string 				The sanitized string
	 */
	protected function sanitize($dirty) {
		return htmlentities(strip_tags($dirty), ENT_QUOTES);
	}

	/**
	 * Sets the title for the view.
	 *
	 * @return string 				Text to be used in the <title> tag
	 */
	abstract public function get_title();

	/**
	 * Loads and outputs the view's markup
	 *
	 * @return void 				
	 */
	abstract public function output_view();

}
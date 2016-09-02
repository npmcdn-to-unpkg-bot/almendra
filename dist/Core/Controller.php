<?php

namespace Almendra\Core;

use Almendra\Exceptions\InvalidNonceException;


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
		if (empty(self::$nonce)) {
			self::$nonce = base64_encode(uniqid(null, true));
			$_SESSION['nonce'] = self::$nonce;
		}

		return self::$nonce;
	}

	/**
	 * Check nonce validity
	 *
	 * @return bool 				true if valid
	 */		
	protected function check_nonce() {
		$nonce = $_SESSION['nonce'];
		$submitted_nonce = $_POST['nonce'];

		if (isset($nonce) && !empty($nonce) && 
			isset($submitted_nonce) && !empty($submitted_nonce) &&
			$nonce === $submitted_nonce) {

			// valid for a submission only
			$_SESSION['nonce'] = null;

			return true;
		} else {
			return false;
		}
	}

	/**
	 * Handles form submissions
	 *
	 * @param string $action 		The action being performed
	 * @return void 				
	 */
	protected function handle_form_submission($action) {
		if (!$this -> check_nonce()) {
			//throw new Exception('Invalid nonce');
			throw new INvalidNonceException;
		}

		// call the method specified action
		$output = $this -> { $this -> actions[$action] }();
		if (is_array($output) && isset($output['room_id'])) {
			$room_id = $output['room_id'];
		} else {
			throw new Exception('Form submission failed.');
		}

		header('Location: ' . APP_URI . 'room/' . $room_id);
		exit;
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
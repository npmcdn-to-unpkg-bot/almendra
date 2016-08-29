<?php

/**
 * Processes the output for the room view
 *
 * @package Core	
 * @author 	Richard Trujillo 	<richard@e-quilibrium.com>
 */
class Error extends Controller {
	private $_message = null;

	/**
	 * Initializes the view
	 *
	 * @param array $options 		Options for the view
	 * @return void 				
	 */
	function __construct($options) {
		if (isset($options[1])) {
			$this -> _message = $options[1];
		}
	}

	/**
	 * Generates the title of the page
	 *
	 * @return string 				The title of the page
	 */
	public function get_title() {
		return 'Something went wrong.';
	}

	/**
	 * Loads and ouputs the view's markup
	 *
	 * @return void 				
	 */
	function output_view() {
		$view = new View('error');

		$view -> message = $this -> _message;
		$view -> home_link = APP_URI . '/' . APP_FOLDER;

		
		$view -> render();
	}
	
}
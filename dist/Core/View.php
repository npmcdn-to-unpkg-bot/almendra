<?php

namespace Almendra\Core;

/**
 * Parses template files with loaded data to output HTML markup
 *
 * @package Core	
 * @author 	Richard Trujillo 	<richard@e-quilibrium.com>
 */
class View {
	protected $view;
	protected $vars = [];
	
	/**
	 * Initializes the view
	 *
	 * @param array $view 		The view slug
	 * @return void 				
	 */
	function __construct($view = null) {
		if (!$view) {
			throw new Exception("No view slug was supplied.");
		}

		$this -> view = $view;
	}

	/**
	 * Stores the data for a view into an array
	 *
	 * @param string $key 		The variable name
	 * @param string $var 		The variable value
	 * @return void 				
	 */
	function __set($key, $var) {
		$this -> vars[$key] = $var;
	}

	/**
	 * Load and parses the selected template using the provided data
	 *
	 * @param boolean $print 		Whether the markup should be the direct output
	 * @return mixed 				A string of markup if $print is true or void
	 */
	function render($print = true) {
		//converts the array of views variables to individual variables
		extract($this -> vars);

		// make sure the requested view exists
		$view_filepath = SYS_PATH . '/views/' . $this -> view . '.inc.php';
		if (!file_exists($view_filepath)) {
			throw new Exception("The file doesn't exists.");
		}

		// turn on the output buffering if markup should be returned, not printed
		if (!$print) {
			ob_start();
		}

		require $view_filepath;

		// return the markup if requested
		if (!$print) {
			return ob_get_clean();
		}
	}


}
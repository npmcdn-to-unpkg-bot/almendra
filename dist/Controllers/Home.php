<?php

namespace Almendra\Controllers;

use \Almendra\Core\Controller as Controller;
use \Almendra\Core\View as View;

/**
 * Generates the output for the class
 *
 * @package Core	
 * @author 	Richard Trujillo 	<richard.trujillo.torres@gmail.com>
 */
class Home extends Controller {
	
	/**
	 * Overrides the parent constructor to avoid an error
	 *
	 * @return bool 				true
	 */
	function __construct() {
		
		return true;
	}

	/**
	 * Generates the title of the page
	 *
	 * @return string 				The title of the page
	 */
	public function get_title() {
		return 'Almendra Framework';
	}

	/**
	 * Loads and ouputs the view's markup
	 *
	 * @return void 				
	 */
	function output_view() {
		$view = new View('home');

		// token
		$view -> nonce = $this -> generate_nonce();

		// action URIs for form submission
		$view -> join_action = APP_URI . 'room/join';
		$view -> create_action = APP_URI . 'room/create';
		//$view -> join_action = APP_URI . APP_FOLDER . '/' . 'room/join';
		//$view -> create_action = APP_URI . APP_FOLDER . '/' . 'room/create';
		
		$view -> render();
	}
}
<?php

namespace Almendra\Controllers;

use Almendra\Core\Controller as Controller;
use Almendra\Core\View as View;
use Almendra\Exceptions\FormException;

/**
 * An example controller
 *
 * @package Core	
 * @author 	Richard Trujillo 	<richard.trujillo.torres@gmail.com>
 */
class Example extends Controller {
	
	/**
	 * Overrides the parent constructor to avoid an error
	 *
	 * @return bool 				true
	 */
	function __construct($options) {

		parent::__construct($options);

		//$this -> model = new Example_Model;
		$this -> actions = [
			'action_example' => 'say_foo',
			];

		if (array_key_exists($options[0], $this -> actions)) {
			$this -> handle_form_submission($options[0]);
			exit;
		} else {
			// no valid form submitted
			// throw exception
			throw new FormException("No valid form submitted.");
		}
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
		$view = new View('example');

		// token
		$view -> nonce = $this -> generate_nonce();

		$view -> sample_action = APP_URI . 'example/sample_action';


		// pass the view some info
		$view -> sample_content = 'This is some sample content.';
		
		$view -> render();
	}

	protected function say_foo() {
		$room_id = $this -> sanitize($_POST['room_id']);
		$sayer_id = $this -> sanitize($_POST['sayer_id']);

		echo 'Foo!';
		die();

		//return $this -> model -> update_foo_count($room_id, $sayer_id);
		return true;
	}
}
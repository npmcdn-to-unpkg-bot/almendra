<?php

namespace Almendra\Exceptions;

/**
* Represents an exception associated to a form submission
*/
class InvalidNonceException extends FormException {
	protected $message = 'Invalid nonce.';

	public function __construct($message = null) {
		parent::__construct();

		if ($message) {
			$this -> message = $message;
		}
	}

	
}
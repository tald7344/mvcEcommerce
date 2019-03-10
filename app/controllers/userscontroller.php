<?php

	namespace PHPECOM\Controllers;

	class UsersController extends AbstractController {
		
		public function defaultAction() {
			echo 'Users Default';
			$this->_view();
		}
	}
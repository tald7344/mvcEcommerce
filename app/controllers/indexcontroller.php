<?php

	namespace PHPECOM\Controllers;

	class IndexController extends AbstractController {
		
		public function defaultAction() {
			echo 'Index Default';
			$this->_view();
		}
	}
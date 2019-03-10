<?php

	namespace PHPECOM\Libraries;

	class FrontController {
		private $_controllers = 'index',
				$_actions = 'default',
				$_params = array();

		public function __construct() {
			$this->parseUrl();
		}

		private function parseUrl() {
			$url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
			if (isset($url[0]) && $url[0] != '') {
				$this->_controllers = $url[0];
			}
			if (isset($url[1]) && $url[1] != '') {
				$this->_actions = $url[1];
			}
			if (isset($url[2]) && $url[2] != '') {
				$this->_params = explode('/', $url[2]);
			}
		}

		public function dispatch() {
			$controllername = 'PHPECOM\Controllers\\' . ucfirst($this->_controllers) . 'Controller';
			var_dump($controllername);
		}

	}
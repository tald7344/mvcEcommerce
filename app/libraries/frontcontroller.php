<?php

	namespace PHPECOM\Libraries;

	class FrontController {

		const NOT_FOUND_CONTROLLERS = 'PHPECOM\Controllers\NotFoundController';
		const NOT_FOUND_ACTIONS 	= 'notfoundAction';

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
			$actionsname = $this->_actions . 'Action';
			if (!class_exists($controllername) || !method_exists($controllername, $actionsname)) {
				$controllername = self::NOT_FOUND_CONTROLLERS;
				$actionsname = $this->_actions = self::NOT_FOUND_ACTIONS;
			}
			$controller = new $controllername();
			$controller->getController($this->_controllers);
			$controller->getActions($this->_actions);
			$controller->getParams($this->_params);
			$controller->$actionsname();
		}

	}
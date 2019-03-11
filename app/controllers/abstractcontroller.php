<?php

	namespace PHPECOM\Controllers;
	use PHPECOM\Libraries\FrontController;

	class AbstractController {
		public $controllers = 'index',
			   $actions = 'default',
			   $params = array(),
			   $template;

		public function notfoundAction() {
			// echo 'Sorry This Class Is Not Found';
		}

		public function getController($controllername) {
			$this->controllers = $controllername;
		}
		
		public function getActions($actionsname) {
			$this->actions = $actionsname;
		}

		public function getParams($paramsname) {
			$this->params = $paramsname;
		}

		public function getTempalte($template) {
			$this->template = $template;
		}

		protected function _view() {
			$path = VIEW_PATH . $this->controllers . DS . $this->actions . '.view.php';
			if ($this->actions == FrontController::NOT_FOUND_ACTIONS || !file_exists($path)) {
				$path = VIEW_PATH . 'notfound' . DS . 'notfound.view.php';
			}
			require $path;
		}			   


	}
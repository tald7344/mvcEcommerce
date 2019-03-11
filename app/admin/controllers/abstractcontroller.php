<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Libraries\FrontController;

	class AbstractController {
		public $controllers = 'index',
			   $actions = 'default',
			   $params = array();

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

		protected function _view() {
			$path = ADMIN_VIEW_PATH . $this->controllers . DS . $this->actions . '.view.php';
			if ($this->actions == FrontController::NOT_FOUND_ACTIONS || !file_exists($path)) {
				$path = ADMIN_VIEW_PATH . 'notfound' . DS . 'notfound.view.php';
			}
			require ADMIN_TEMPLATES_PATH . 'header_start.php';
			require ADMIN_TEMPLATES_PATH . 'header_sources.php';
			require ADMIN_TEMPLATES_PATH . 'header_end.php';			
			require ADMIN_TEMPLATES_PATH . 'wrapper_start.php';			
			require ADMIN_TEMPLATES_PATH . 'navbar.php';			
			require $path;
			require ADMIN_TEMPLATES_PATH . 'wrapper_end.php';
			require ADMIN_TEMPLATES_PATH . 'footer_sources.php';		
			require ADMIN_TEMPLATES_PATH . 'footer.php';			
		}			   


	}
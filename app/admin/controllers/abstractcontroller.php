<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Libraries\FrontController;

	class AbstractController {
		public $controllers = 'index',
			   $actions = 'default',
			   $params = array(),
			   $template,
			   $_data = array();

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

		public function getTemplate($template) {
			$this->template = $template;
		}

		protected function _view() {
			$path = ADMIN_VIEW_PATH . $this->controllers . DS . $this->actions . '.view.php';
			if ($this->actions == FrontController::NOT_FOUND_ACTIONS || !file_exists($path)) {
				$path = ADMIN_VIEW_PATH . 'notfound' . DS . 'notfound.view.php';
			}

			$this->template->getData($this->_data);
			$this->template->setActionViewFile($path);
			$this->template->renderTemplates();
		}			   


	}
<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Libraries\FrontController;

	class AbstractController {
		public $controllers = 'index',
			   $actions = 'default',
			   $params = array(),
			   $_data = array(),
			   $template,
			   $registry;

		public function __get($key) {
			return $this->registry->$key;
		}

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

		public function getRegistry($registry) {
			$this->registry = $registry;
		}		

		protected function _view() {
			$path = ADMIN_VIEW_PATH . $this->controllers . DS . $this->actions . '.view.php';
			if ($this->actions == FrontController::NOT_FOUND_ACTIONS || !file_exists($path)) {
				$path = ADMIN_VIEW_PATH . 'notfound' . DS . 'notfound.view.php';
			}
			// Merger Data Array With Dictionary Array
			$data = array_merge($this->_data, $this->languages->getDictionary());
			$this->template->getData($data); // Send Mergeing Array TO Template Class
			$this->template->setActionViewFile($path); 
			$this->template->getRegistry($this->registry);
			$this->template->renderTemplates();
		}			   


	}
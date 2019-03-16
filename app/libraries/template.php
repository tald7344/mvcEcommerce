<?php

	namespace PHPECOM\Libraries;

	class Template {
		private $_templatesPath,
				$_data,
				$_action_view,
				$_registry;

		public function __construct($templatesPath) {
			$this->_templatesPath = $templatesPath;
		}

		public function __get($key) {
			return $this->_registry->$key;
		}

		public function getData($data) {
			$this->_data = $data;
		}

		public function setActionViewFile($path) {
			$this->_action_view = $path;
		}

		public function getRegistry($registry) {
			$this->_registry = $registry;
		}

		private function renderTemplateHeaderStart() {
			extract($this->_data);
			require_once ADMIN_TEMPLATES_PATH . 'header_start.php';
		}

		private function renderTemplateHeaderEnd() {
			require_once ADMIN_TEMPLATES_PATH . 'header_end.php';
		}

		private function renderTemplateFooter() {
			require_once ADMIN_TEMPLATES_PATH . 'footer.php';
		}

		// Method To Require all Block Section In Our Project [header, navbar, .....]
		private function renderTemplateBlock() {
			// Check If There Is Templates Array Key Name In Our Array Or Not
			if (!array_key_exists('templates', $this->_templatesPath)) {
				trigger_error('Sorry You Have To Defined The Template Block', E_USER_WARNING);
			} else {
				$templates = $this->_templatesPath['templates'];
				if (!empty($templates)) {
					extract($this->_data);					
					foreach($templates as $template => $templatePath) {
						if ($template == ':content') {
							require_once $this->_action_view;
						} else {
							require_once $templatePath;
						}
					}
				}
			}			
		}


		// Method To Requier Resources For The Header
		private function renderHeaderResources() {
			$output = '';
			if (!array_key_exists('header_resources', $this->_templatesPath)) {
				trigger_error('Sorry You Have to Defined The Resources Header', E_USER_WARNING);
			} else {
				$cssResources = $this->_templatesPath['header_resources'];
				if (!empty($cssResources)) {
					extract($this->_data);					
					foreach($cssResources as $resource => $resourcekey) {
						$output .= '<link rel="stylesheet" href="' . $resourcekey . '" />';
					}
				}
				echo $output;
			}
		}

		// Method To Requier Resources For The Footer
		private function renderFooterResources() {
			$output = '';
			if (!array_key_exists('footer_resources', $this->_templatesPath)) {
				trigger_error('Sorry You Have to Defined The Resources Footer', E_USER_WARNING);
			} else {
				$jsResources = $this->_templatesPath['footer_resources'];
				if (!empty($jsResources)) {
					extract($this->_data);					
					foreach($jsResources as $resource => $resourcekey) {
						$output .= '<script src="' . $resourcekey . '"></script>';
					}
				}
				echo $output;
			}
		}

		public function renderTemplates() {
			$this->renderTemplateHeaderStart();
			$this->renderHeaderResources();
			$this->renderTemplateHeaderEnd();
			$this->renderTemplateBlock();
			$this->renderFooterResources();
			$this->renderTemplateFooter();
		}

	}
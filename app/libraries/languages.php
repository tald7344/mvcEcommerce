<?php

	namespace PHPECOM\Libraries;

	class Languages {
		private $_dictionary = array();

		public function lang($path) {
			$defaultLanguage = DEFAULT_LANGUAGES;
			if (isset($_SESSION['lang'])) {
				$defaultLanguage = $_SESSION['lang'];
			}
			if (!empty($path)) {
				$path = strtolower(str_replace('.', DS, $path));
				$langPath = ADMIN_LANGUAGES_PATH .  $defaultLanguage  . DS . $path . '.lang.php';
				if (file_exists($langPath)) {
					require $langPath;
					if (isset($_) && is_array($_) && !empty($_)) {
						foreach($_ as $key => $value) {
							$this->_dictionary[$key] = $value; 
						}
					}
				} else {
					trigger_error('Sorry This File ' . $path . ' Is Not Exists', E_USER_WARNING);
				}
			}
		}

		public function getKey($key) {
			return $this->_dictionary[$key];
		}



		public function getDictionary() {
			return $this->_dictionary;
		}

	}
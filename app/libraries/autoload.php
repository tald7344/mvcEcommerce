<?php

	namespace PHPECOM\Libraries;

	class AutoLoad {

		public static function autoload($classname) {
			$classname = str_replace('PHPECOM\\', '', $classname);
			$classname = strtolower($classname);
			$classname = APP_PATH . $classname . '.php';
			if (file_exists($classname)) {
				require_once $classname;				
			}
		}
	}

	spl_autoload_register(__NAMESPACE__ . DS . 'AutoLoad::autoload');
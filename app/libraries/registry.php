<?php

	namespace PHPECOM\Libraries;

	class Registry {
		private static $_instance;

		public function __construct() {}
		private function __clone() {}

		public static function getInstance() {
			if (self::$_instance === null) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function __get($key) {
			return $this->$key;
		}

		public function __set($key, $value) {
			return $this->$key = $value;
		}
	}
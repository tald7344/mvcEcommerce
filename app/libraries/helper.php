<?php

	namespace PHPECOM\Libraries;

	trait Helper {
		public function redirect($path) {
			if (isset($path)) {
				session_write_close();
				header('location: ' . $path);
				exit;
			}
			return false;
		}
	}
<?php

	namespace PHPECOM;
	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}


	defined('APP_PATH') 			? null : define('APP_PATH', dirname(realpath(__FILE__)) . DS . '..' . DS);
	
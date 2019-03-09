<?php

	namespace PHPECOM;
	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}

	var_dump(dirname(realpath(__FILE__)));

	defined('APP_PATH') 			? null : define('APP_PATH', );
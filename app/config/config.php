<?php

	namespace PHPECOM;
	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}


	defined('APP_PATH') 			? null : define('APP_PATH', dirname(realpath(__FILE__)) . DS . '..' . DS);
	defined('VIEW_PATH') 			? null : define('VIEW_PATH', APP_PATH .'views' . DS);
	defined('ADMIN_VIEW_PATH') 		? null : define('ADMIN_VIEW_PATH', APP_PATH . 'admin' . DS . 'views' . DS);
	defined('ADMIN_TEMPLATES_PATH') 		? null : define('ADMIN_TEMPLATES_PATH', APP_PATH . 'admin' . DS . 'templates' . DS);
	defined('JS') 					? null : define('JS', DS . 'js' . DS);
	defined('CSS') 					? null : define('CSS', DS . 'css' . DS);
	
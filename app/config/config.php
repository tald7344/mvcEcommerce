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
	
	// Connect To Database
	defined('DATABASE_HOST_NAME') 	? null : define('DATABASE_HOST_NAME', 'localhost');
	defined('DATABASE_NAME') 		? null : define('DATABASE_NAME', 'mvc_market');
	defined('DATABASE_USERNAME') 	? null : define('DATABASE_USERNAME', 'root');
	defined('DATABASE_PASSWORD') 	? null : define('DATABASE_PASSWORD', '');

	// Session Configuration
	defined('SESSION_NAME')			? null : define('SESSION_NAME', '_TECOM_SESS');
	defined('SESSION_DOMAIN')		? null : define('SESSION_DOMAIN', '.mvcecommerce.dev');	
	defined('SESSION_SAVE_PATH')    ? null : define('SESSION_SAVE_PATH', APP_PATH . '..' . DS . 'sessions' . DS);

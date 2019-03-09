<?php

	namespace PHPECOM;
	use PHPECOM\Libraries\FrontController;
	

	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}

	require '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
	require APP_PATH . 'libraries' . DS . 'autoload.php';

	$frontcontroller = new FrontController();
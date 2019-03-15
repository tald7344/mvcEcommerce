<?php

	namespace PHPECOM;
	use PHPECOM\Libraries\FrontController;
	use PHPECOM\Libraries\Template;
	use PHPECOM\Libraries\Database\DatabaseHandler;
	use PHPECOM\Libraries\SessionManager;


	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}

	require '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
	require APP_PATH . 'libraries' . DS . 'autoload.php';
	$templatePath = require APP_PATH . 'config' . DS . 'templateconfig.php';

	$session = new SessionManager();
	DatabaseHandler::getInstance();
	$template = new Template($templatePath);

	$frontcontroller = new FrontController($template);
	$frontcontroller->dispatch();
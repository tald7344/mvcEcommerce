<?php

	namespace PHPECOM;
	use PHPECOM\Libraries\FrontController;
	use PHPECOM\Libraries\Template;
	use PHPECOM\Libraries\Database\DatabaseHandler;
	use PHPECOM\Libraries\SessionManager;
	use PHPECOM\Libraries\Languages;


	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}

	require '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
	require APP_PATH . 'libraries' . DS . 'autoload.php';
	$templatePath = require APP_PATH . 'config' . DS . 'templateconfig.php';

	$session = new SessionManager();
	$session->start();
	if (!isset($session->lang)) {
		$session->lang = DEFAULT_LANGUAGES;
	}
	$languages = new Languages();
	DatabaseHandler::getInstance();
	$template = new Template($templatePath);

	$frontcontroller = new FrontController($template, $languages);
	$frontcontroller->dispatch();
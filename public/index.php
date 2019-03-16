<?php

	namespace PHPECOM;
	use PHPECOM\Libraries\FrontController;
	use PHPECOM\Libraries\Template;
	use PHPECOM\Libraries\Database\DatabaseHandler;
	use PHPECOM\Libraries\SessionManager;
	use PHPECOM\Libraries\Languages;
	use PHPECOM\Libraries\Registry;


	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}

	require '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
	require APP_PATH . 'libraries' . DS . 'autoload.php';

	$session = new SessionManager();
	$session->start();
	if (!isset($session->lang)) {
		$session->lang = DEFAULT_LANGUAGES;
	}

	$templatePath = require APP_PATH . 'config' . DS . 'templateconfig.php';

	$languages = new Languages();
	DatabaseHandler::getInstance();
	$template = new Template($templatePath);

	$registry = Registry::getInstance();
	$registry->languages = $languages;
	$registry->session = $session;
	

	$frontcontroller = new FrontController($template, $registry);
	$frontcontroller->dispatch();
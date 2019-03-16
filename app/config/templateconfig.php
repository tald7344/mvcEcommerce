<?php

// This File To Return The Path For All Files In Our Projects
$backend_css = CSS . 'backend_rtl.css';
$backend_js = JS . 'backend_rtl.js';
$backend_css = (isset($_SESSION['lang']) && ($_SESSION['lang'] == 'ar')) ? CSS . 'backend_rtl.css' : CSS . 'backend_ltr.css';
$backend_js = (isset($_SESSION['lang']) && ($_SESSION['lang'] == 'ar')) ? JS . 'backend_rtl.js' : JS . 'backend_ltr.js';

return [
	'templates' => [
		'wrapper_start' => ADMIN_TEMPLATES_PATH . 'wrapper_start.php',
		'navbar' 		=> ADMIN_TEMPLATES_PATH . 'navbar.php',
		':content' 		=> ':content',
		'wrapper_end' 	=> ADMIN_TEMPLATES_PATH . 'wrapper_end.php'
	],
	'header_resources' => [
		'css-bootstrap' => CSS . 'bootstrap.min.css',
		'font-awesome' 	=> CSS . 'font-awesome.min.css',
		'css-backend' 	=> $backend_css
	],
	'footer_resources' => [
		'jquery' 		=> JS . 'jquery-3.3.1.min.js',
		'popper' 		=> JS . 'popper.min.js',
		'js-bootstrap' 	=> JS . 'bootstrap.min.js',
		'js-backend' 	=> $backend_js
	]
];

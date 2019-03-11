<?php

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
		'css-backend' 	=> CSS . 'backend.css'
	],
	'footer_resources' => [
		'jquery' 		=> JS . 'jquery-3.3.1.min.js',
		'popper' 		=> JS . 'popper.min.js',
		'js-bootstrap' 	=> JS . 'bootstrap.min.js',
		'js-backend' 	=> JS . 'backend.js'
	]
];

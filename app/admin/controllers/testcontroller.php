<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Libraries\Database\DatabaseHandler;

	class TestController extends AbstractController {
		public function defaultAction() {
			$sql = 'select * from app_users_groups';
			$conn = DatabaseHandler::getInstance()->prepare($sql);
			$conn->execute();
			$f = $conn->fetchAll();
			var_dump($f);
			$this->_view();
		}
	}
<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Libraries\Database\DatabaseHandler;
	use PHPECOM\Admin\Models\UsersGroupModel;
	use PHPECOM\Libraries\SessionManager;

	class TestController extends AbstractController {
		public function defaultAction() {
			$session = new SessionManager();
			$session->start();
			$this->_view();
		}
	}
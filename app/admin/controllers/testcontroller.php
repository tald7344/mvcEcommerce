<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Libraries\Database\DatabaseHandler;
	use PHPECOM\Admin\Models\UsersGroupModel;

	class TestController extends AbstractController {
		public function defaultAction() {
			echo UsersGroupModel::getTableModelName();
			$this->_view();
		}
	}
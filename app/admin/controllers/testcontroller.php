<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Libraries\Database\DatabaseHandler;
	use PHPECOM\Admin\Models\UsersGroupModel;

	class TestController extends AbstractController {
		public function defaultAction() {
			$this->_data['group'] = UsersGroupModel::getAll();
			$this->_view();
		}
	}
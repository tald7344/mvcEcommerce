<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Libraries\Database\DatabaseHandler;
	use PHPECOM\Admin\Models\UsersGroupModel;
	use PHPECOM\Libraries\SessionManager;
	use PHPECOM\Libraries\Languages;

	class TestController extends AbstractController {
		public function defaultAction() {
			$this->languages->lang('categories.default');
			$this->_view();
		}
	}
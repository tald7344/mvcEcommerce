<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Admin\Models\CategoriesModel;

	class CategoriesController extends AbstractController {
		public function defaultAction() {
			$this->_data['categories'] = CategoriesModel::getAll();
			$this->_view();
		}

		public function createAction() {
			$this->_view();
		}
	}
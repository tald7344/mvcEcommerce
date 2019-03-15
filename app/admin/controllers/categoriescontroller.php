<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Admin\Models\CategoriesModel;
	use PHPECOM\Libraries\InputFilter;	
	use PHPECOM\Libraries\Helper;

	class CategoriesController extends AbstractController {
		use InputFilter;
		use Helper;

		public function defaultAction() {
			$this->languages->lang('template.common');
			$this->_data['categories'] = CategoriesModel::getAll();
			$this->_view();
		}

		public function createAction() {
			if (isset($_POST['save'])) {
				$categories = new CategoriesModel();
				$categories->Catname = $this->filterStr($_POST['Catname']);
				$categories->Catdesc = $this->filterStr($_POST['Catdesc']);
				$categories->CatVisible = $this->filterInt($_POST['CatVisible']);
				$categories->CatComment = $this->filterInt($_POST['CatComment']);
				$categories->CatAds = $this->filterInt($_POST['CatAds']);
				if ($categories->save()) {
					$this->redirect('/admin/categories');
				}
			}
			$this->_view();
		}
	}
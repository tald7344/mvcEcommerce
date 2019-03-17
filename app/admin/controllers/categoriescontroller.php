<?php

	namespace PHPECOM\Admin\Controllers;
	use PHPECOM\Admin\Models\CategoriesModel;
	use PHPECOM\Libraries\InputFilter;	
	use PHPECOM\Libraries\Helper;	
	use PHPECOM\Libraries\Messenger;

	class CategoriesController extends AbstractController {
		use InputFilter;
		use Helper;

		public function defaultAction() {
			$this->languages->lang('template.common');
			$this->languages->lang('categories.default');
			$this->_data['categories'] = CategoriesModel::getAll();
			$this->_view();
		}

		public function createAction() {
			$this->languages->lang('template.common');
			$this->languages->lang('categories.create');
			$this->languages->lang('categories.label');
			$this->languages->lang('categories.messages');
			if (isset($_POST['save'])) {
				$categories = new CategoriesModel();
				$categories->Catname 	= $this->filterStr($_POST['Catname']);
				$categories->Catdesc 	= $this->filterStr($_POST['Catdesc']);
				$categories->CatVisible = $this->filterInt($_POST['CatVisible']);
				$categories->CatComment = $this->filterInt($_POST['CatComment']);
				$categories->CatAds 	= $this->filterInt($_POST['CatAds']);
				if ($categories->save()) {
					$this->messenger->addMessages($this->languages->getKey('categories_create_success'), Messenger::SESSION_MSG_SUCCESS);
					$this->redirect('/admin/categories');
				} else {
					$this->messenger->addMessages($this->languages->getKey('categories_create_failed'), Messenger::SESSION_MSG_ERROR);
				}
			}
			$this->_view();
		}


		public function editAction() {
			$id = $this->filterInt($this->params[0]);
			$category = CategoriesModel::getByPK($id);			
			if ($category === false) {
				$this->redirect('/admin/categories');
			}
			$this->_data['category'] = $category;
			$this->languages->lang('template.common');
			$this->languages->lang('categories.edit');
			$this->languages->lang('categories.label');
			$this->languages->lang('categories.messages');
			if (isset($_POST['save'])) {
				$category->Catname 		= $this->filterStr($_POST['Catname']);
				$category->Catdesc 		= $this->filterStr($_POST['Catdesc']);
				$category->CatVisible 	= $this->filterInt($_POST['CatVisible']);
				$category->CatComment 	= $this->filterInt($_POST['CatComment']);
				$category->CatAds 		= $this->filterInt($_POST['CatAds']);
				if ($category->save()) {
					$this->messenger->addMessages($this->languages->getKey('categories_edit_success'), Messenger::SESSION_MSG_SUCCESS);
					$this->redirect('/admin/categoreis');
				} else {
					$this->messenger->addMessages($this->languages->getKey('categories_edit_failed'), Messenger::SESSION_MSG_ERROR);
				}
			}
			$this->_view();
		}

		public function deleteAction() {
			$id = $this->filterInt($this->params[0]);
			$category = CategoriesModel::getByPK($id);			
			if ($category === false) {
				$this->redirect('/admin/categories');
			}
			$this->languages->lang('categories.messages');
			if ($category->delete()) {
				$this->messenger->addMessages($this->languages->getKey('categories_delete_success'), Messenger::SESSION_MSG_SUCCESS);
				$this->redirect('/admin/categories');
			} else {
				$this->messenger->addMessages($this->languages->getKey('categories_delete_failed'), Messenger::SESSION_MSG_ERROR);
			}

		}
	}
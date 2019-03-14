<?php

	namespace PHPECOM\Admin\Models;

	class CategoriesModel extends AbstractModel {
		public $Catid,
			   $Catname,
			   $Catdesc,
			   $CatVisible,
			   $CatComment,
			   $CatAds;

		protected static $_primarykey = 'Catid';
		protected static $_tableName = 'app_products_categories';
		protected static $_tableSchema = array(
			'Catname' 		=> self::DATA_TYPE_STR,
			'Catdesc' 		=> self::DATA_TYPE_STR,
			'CatVisible' 	=> self::DATA_TYPE_INT,
			'CatComment' 	=> self::DATA_TYPE_INT,
			'CatAds' 		=> self::DATA_TYPE_INT
		);
	}
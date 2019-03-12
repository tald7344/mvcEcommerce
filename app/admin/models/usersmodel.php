<?php

	namespace PHPECOM\Admin\Models;

	class UsersModel extends AbstractModel {
		public $Userid,
			   $Username,
			   $Password,
			   $Email;

		protected static $_tableName = 'app_users';
		protected static $_tableSchema = array(
			'Username' 	=> self::DATA_TYPE_STR,
			'Password' 	=> self::DATA_TYPE_STR,
			'Email'   	=> self::DATA_TYPE_BOOL,
		);
	}
<?php

	namespace PHPECOM\Admin\Models;

	class UsersModel extends AbstractModel {
		public $Userid,
			   $Username,
			   $Password,
			   $Email;

		private static $_tableName = '';
		private static $_tableSchema = array(
			'Username' => self::DATA_TYPE_STR,
			'Password' => self::DATA_TYPE_STR,
			'Email'   => self::DATA_TYPE_STR,
		);
	}
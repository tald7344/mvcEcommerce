<?php

	namespace PHPECOM\Admin\Models;

	class UsersGroupModel extends AbstractModel {
		public $Groupid,
			   $Groupname;

		protected static $_primarykey = 'Groupid';
		protected static $_tableName = 'app_users_groups';
		protected static $_tableSchema = array(
			'Groupname'  => self::DATA_TYPE_STR
		);

	}
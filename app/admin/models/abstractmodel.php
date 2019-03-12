<?php

	namespace PHPECOM\Admin\Models;

	class AbstractModel {

		const DATA_TYPE_STR = PDO::PARAM_STR;
		const DATA_TYPE_INT = PDO::PARAM_INT;
		const DATA_TYPE_BOOL = PDO::PARAM_BOOL;
		

		public function create() {
			$sql = 'INSERT INTO users SET username = :username, password = :password';

		}	
	}
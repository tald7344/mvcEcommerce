<?php

	namespace PHPECOM\Admin\Models;
	use PHPECOM\Libraries\Database\DatabaseHandler;

	class AbstractModel {

		const DATA_TYPE_STR 	= \PDO::PARAM_STR;
		const DATA_TYPE_INT 	= \PDO::PARAM_INT;
		const DATA_TYPE_BOOL 	= \PDO::PARAM_BOOL;
		const DATA_TYPE_DECIMAL = 4;


		private static function getTableSchema() {
			$output = '';
			foreach (static::$_tableSchema as $columnName => $columnType) {
				$output .= $columnName . ' = :' . $columnName . ', ';
			}
			return trim($output, ', ');
		}

		private function prepareBindValue(\PDOStatement &$stmt) {
			foreach (static::$_tableSchema as $columnName => $columnType) {
				if ($columnType == 4) {
					$sanitizeColumn = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
					$stmt->bindValue(":{$columnName}", $sanitizeColumn);
				} else {
					$stmt->bindValue(":{$columnName}", $this->$columnName, $columnType);
				}
			}
		}

		public function create() {
			$sql = 'INSERT INTO ' . static::$_tableName . ' SET ' . self::getTableSchema();
			$stmt = DatabaseHandler::getInstance()->prepare($sql);
			$this->prepareBindValue($stmt);
			if ($stmt->execute()) {
				$this->{static::$_primarykey} = DatabaseHandler::getInstance()->lastInsertId();
				return true;
			}
			return false;
		}

		public function update() {
			$sql = 'UPDATE ' . static::$_tableName . ' SET ' . self::getTableSchema() . ' WHERE ' . static::$_primarykey . ' = ' . $this->{static::$_primarykey};
			$stmt = DatabaseHandler::getInstance()->prepare($sql);
			$this->prepareBindValue($stmt);
			return $stmt->execute();
		}

		public function save() {
			return $this->{static::$_primarykey} === null ? $this->create() : $this->update();
		}

		public function delete() {
			$sql = 'DELETE FROM ' . static::$_tableName . ' WHERE ' . static::$_primarykey . ' = ' . $this->{static::$_primarykey};
			$stmt = DatabaseHandler::getInstance()->prepare($sql);
			return $stmt->execute();
		}

		// Method TO Get All Data
		public static function getAll() {
			$sql = 'SELECT * FROM ' . static::$_tableName;
			// DatabaseHandler::factory() is PDO Object
			$stmt = DatabaseHandler::getInstance()->prepare($sql);
			if ($stmt->execute()) {
				if (method_exists(get_called_class(), '__construct')) {
					$result = $stmt->fetchAll(
						\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 
						get_called_class(), 
						array_keys(static::$_tableSchema)
					);
				} else {
					$result = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
				}
				return (is_array($result) && !empty($result)) ? $result : false;				
			}
			return false;
		}

		// Method TO Get Data Using Primary Key
		public static function getByPK($primarykey) {
			$sql = 'SELECT * FROM ' . static::$_tableName . ' WHERE ' . static::$_primarykey . ' = ' . $primarykey; 
			$stmt = DatabaseHandler::getInstance()->prepare($sql);
			if ($stmt->execute()) {
				if (method_exists(get_called_class(), '__construct')) {
					$obj = $stmt->fetchAll(
						\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 
						get_called_class(), 
						array_keys(static::$_tableSchema)
					);
				} else {
					$obj = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
				}
				return !empty($obj) ? array_shift($obj) : false;
			}
			return false;
		}

		public static function getBy($columns, $options = array()) {
			if (is_array($columns) && !empty($columns)) {			
				$arrayColumnsKeys = array_keys($columns);
				$arrayColumnsValues = array_values($columns);
				$arrayColumns = '';
				for ($i = 0; $i < count($columns); $i++) {
					$arrayColumns .= $arrayColumnsKeys[$i] . ' = "' . $arrayColumnsValues[$i] . '" AND ';
				}
				$arrayColumns = trim($arrayColumns, ' AND '); 
				$sql = 'SELECT * FROM ' . static::$_tableName . ' WHERE ' . $arrayColumns;
				return static::get($sql, $options);
			}
			return false;
		}

		public static function get($sql, $options = array()) {
			/*
				UsersModel::get(
					'insert into app_users set username = :usernamer',
					array(username => array(UsernameModel::DATA_TYPE_STR, 'talal'))
				)
			*/
			$stmt = DatabaseHandler::getInstance()->prepare($sql);
	        if(!empty($options)) {
		        foreach ($options as $columnName => $type) {
			        if($type[0] == 4) {
			            $sanitizedValue = filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
			            $stmt->bindValue(":{$columnName}", $sanitizedValue);
				    } else {
			            $stmt->bindValue(":{$columnName}", $type[1], $type[0]);
			        }
		        }            
	        }
			if ($stmt->execute()) {
				if (method_exists(get_called_class(), '__construct')) {
					$result = $stmt->fetchAll(
						\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 
						get_called_class(), 
						array_keys(static::$tableSchema)
					);
				} else {
					$result = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
				}
				return is_array($result) && !empty($result) ? $result : false;
			}
			return false;   
		}

		public static function getTableModelName() {
			return static::$_tableName;
		}

	}
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


	}
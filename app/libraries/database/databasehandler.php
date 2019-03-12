<?php
	
	namespace PHPECOM\Libraries\Database;

	class DatabaseHandler {
		private static $_instance = null; // Defined To Store Our PDODatabaseHandler Object In IT
		private static $_handler;  // Defined To Store Our PDO Connection Inside IT
		private static $_options = array( // We Must Use It to Store the Inputing Arabic Data In Database As Arabic
			\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
		);		

		// Construct Method To execute Our Init Method
		private function __construct() {
			try {
				self::$_handler = new \PDO(
					'mysql:host=' . DATABASE_HOST_NAME . ';dbname=' . DATABASE_NAME,
					DATABASE_USERNAME, DATABASE_PASSWORD,
					self::$_options
				);
				self::$_handler->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			} catch(\PDOException $e) {
				// Kill The Program And Show The Message
				echo $e->getMessage( ) ." | ". $e->getCode( );
			}

		}
		
		// Method To Start Our Instance And Make The PDO Connection Object
		public static function getInstance() {
			if(self::$_instance === null){
			    self::$_instance = new self(); // self Return To The PDODatabaseHandler Class
			}
			return self::$_handler; 
		}		
	}


















<?php

	namespace PHPECOM\Libraries;

	// Class For Controll The Messages In The Project
	class Messenger {

		// Constant Properies To Define The Session Type Message
		const SESSION_MSG_SUCCESS   = 'success';
		const SESSION_MSG_ERROR		= 'danger';
		const SESSION_MSG_WARNING   = 'warning';
		const SESSION_MSG_INFO		= 'info';

		private static $_instance; // For Make One Instance
		private $_session;
		private $_messages = array();

		private function __construct($session) {
			$this->_session = $session;
		} 

		private function __clone() {}// to Prevent Clone Our Object

		// Method TO Control Call the Registry Class One Time 
		public static function getInstance(SessionManager $session) {
			if (self::$_instance === null) {
				self::$_instance = new self($session);
			}
			return self::$_instance;
		}

		// Method TO Add Message And Store It In The Session
		public function addMessages($message, $type = self::SESSION_MSG_SUCCESS) {
			if (!$this->messageExists()) {
				$this->_session->messages = array();
			}
			
			/* First Way : Wrong
				$this->_session->messages[] = [$message, $type];
			*	By Using This Way Only We Will Have This Error [ Indirect modification of overloaded property ];
			*	Because The Property [ messages ] Is Not Real Property So We Can't Use It Any Where
			*/

			// Second Way By Store It In Variable
			$msg = $this->_session->messages;
			$msg[] = [$message, $type];
			$this->_session->messages = $msg;

		}

		// Method To Check For Exists Properties
		private function messageExists() {
			return isset($this->_session->messages);
		}

		// Methdo To Get The stored Messages
		public function getMessages() {
			if ($this->messageExists()) {
				$this->_messages = $this->_session->messages;
				unset($this->_session->messages);
				return $this->_messages;
			}
			return false;
		}
	}
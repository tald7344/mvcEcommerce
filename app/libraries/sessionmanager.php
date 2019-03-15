<?php

	namespace PHPECOM\Libraries;

	class SessionManager extends \SessionHandler {
		private $_sessionName = SESSION_NAME,
				$_sessionMaxLifeTime = 0,
				$_sessionPath = '/',
				$_sessionDomain = SESSION_DOMAIN,
				$_sessionSSL = false,
				$_sessionHttpOnly = true,
				$_sessionSavePath = SESSION_SAVE_PATH,
				$_sessionRegenerateIdTime = 1;

		// Create Crypt Properties
		private $_sessionCipherAlgo = 'AES-128-ECB',
				$_sessionCipherKey = 'MYCRYPT0K3Y@2018';

		// Create Construct Method
		public function __construct() {
			$this->_sessionSSL = isset($_SERVER['HTTPS']) ? true : false;
			$this->_sessionDomain = str_replace('www', '', $_SERVER['SERVER_NAME']);
			/* To Make Sure That My Data Will Bring And Write From Session Using My Cookies That I Have Been Written
			   will use cookies to store the session id on the client side. Defaults to 1 (enabled).*/ 
			ini_set('session.use_cookies', 1);
			// Enabling this setting prevents attacks involved passing session ids in URLs | Prevent javascript to access it
			ini_set('session.use_only_cookies', 1);
			// To Prevent Accessing To My Session Using The Session Id In URL
			ini_set('session.use_trans_sid', 0);
			// It defines the name of the handler which is used for storing and retrieving data associated with a session
			ini_set('session.save_handler', 'files');
			// Make New Session Name
			session_name($this->_sessionName);
			// Create New Session Saving Path
			session_save_path($this->_sessionSavePath);
			// Set New Session Cookies Parameters
			session_set_cookie_params(
				$this->_sessionMaxLifeTime, $this->_sessionPath, $this->_sessionDomain, $this->_sessionSSL, $this->_sessionHttpOnly
			);
			// Set This Class As The Session Save Handler To Make All Functions As [read, write, close ....] Take It's Data From It
			// session_set_save_handler($this, true); // Control All Operations From Our Own Class Not SessionHandler Class
		}

		// Create Our Get Magic Method To Get Data From Session
		public function __get($key) {
			if (isset($_SESSION[$key])) {
				$data = @unserialize($_SESSION[$key]);
				if ($data === false) {
					return $_SESSION[$key];
				} else {
					return $data;
				}
			} else {
				trigger_error('No Session Key ' . $key . ' Exists ' . E_USER_NOTICE);
			}
		}

		// Create Our Set Magic Method To Insert New Session Data To Our Session
		public function __set($key, $value) {
			// Chech If The Value Is Object
			if (is_object($value)) {
				$_SESSION[$key] = serialize($value);
			} else {
				$_SESSION[$key] = $value;
			}
		}

		// Create isset Method To Execute When Using isset function
		// it's Useful for Making the [ isset($this->sessionStartTime) ] Is Working
		public function __isset($key) {
			return isset($_SESSION[$key]) ? true : false;
		}

		// Unset Method To Make Unset For The Property Which not Exists Actualy
		public function __unset($key) {
			unset($_SESSION[$key]);
		}

		// Create Read Method To Controlling Reading Our Session Data
		public function read($id) {
			return openssl_decrypt(parent::read($id), $this->_sessionCipherAlgo, $this->_sessionCipherKey);
		}

		// Create Write Method To Controlling Writting Our Session Data Encrypting
		public function write($id, $data) {
			return parent::write($id, openssl_encrypt($data, $this->_sessionCipherAlgo, $this->_sessionCipherKey));
		}

		// Create Start Method To Control The Session Start
		public function start() {
			// Make Check If The Session ID Is Empty Or Not Which Mean The Session Is Closed
			if (session_id() === '') {
				if (session_start()) {
					$this->sessionStartTime();
					$this->sessionTimeValidate();
				}
			}
		}

		// Create sessionStartTime Method To Set Period Changing SessionId 
		private function sessionStartTime() {
			if (!isset($this->sessionStartTime)) { // Magic Method __get, __set Will Execute 
				$this->sessionStartTime = time();
			}
			return true;
		}

		// Create Session Validate For Check SessionTime
		private function sessionTimeValidate() {
			if ((time() - $this->sessionStartTime) > ($this->_sessionRegenerateIdTime * 60)) {
				// Create New Session ID
				$this->renewSession();
				// Create New FingerPrint
				$this->generatingFingerPrint();
			}
			return true;
		}

		// Create renewSession To Generate New Session Id
		private function renewSession() {
			// Reset TimeToRegenerateID 
			$this->sessionStartTime = time();
			// Generate New Session Id
			return session_regenerate_id(true); // If True That Mean delete The Old One And Create New Session File
		}

		// Create Kill Method To Kill The Session
		public function kill() {
			// First Unset The Session
			session_unset();
			// Delete The Cookies
			setcookie(
				$this->_sessionName, 
				'', 
				time() - 1000, 
				$this->_sessionPath, 
				$this->_sessionDomain, 
				$this->_sessionSSL, 
				$this->_sessionHttpOnly);
			// Destroyed The Session
			session_destroy();
		}

		// Create Method To Make FingerPrint
		private function generatingFingerPrint() {
			// Fetch User Agent
			$userAgent = $_SERVER['HTTP_USER_AGENT'];
			// Make Cipher Random Key
			$this->cipher = openssl_random_pseudo_bytes(16);
			// Fetch The Session Id
			$sessionID = session_id();
			// Store All The Past Stuff In Class Property
			$this->fingerPrint = sha1($userAgent . $this->cipher . $sessionID);
		}

		public function isValideSession() {
			// Check If The FingerPrint Is Set OR not
			if (!isset($this->fingerPrint)) {
				$this->generatingFingerPrint();
			}
			// Store Our FingerPrint Data In Local Varible
			$fingerPrint = sha1($_SERVER['HTTP_USER_AGENT'] . $this->cipher . session_id());
			// Check If The FingerPrint Already Maked It's Equal To The Local FingerPrint
			if ($fingerPrint === $this->fingerPrint) {
				return true;
			}
			return false;
		}
	}
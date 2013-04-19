<?php
class Model_Session {
	public static $session;

	public static function getSession() {
		return self::$session;
	}

	public function __construct() {
		session_start();
		self::$session = $this;
	}

	public function __get($name) {
		return $_SESSION[$name];
	}

	public function __set($name, $value) {
		$_SESSION[$name] = $value;
	}

	public function authenticate() {
		$_SESSION['AUTHENTICATED'] = true;
	}

	public function unauthenticate() {
		unset($_SESSION['AUTHENTICATED']);
	}

	public function isAuthenticated() {
		return $_SESSION['AUTHENTICATED'];
	}

	public function regenerate() {
		session_regenerate_id();
	}

	public function destroy() {
		unset($_SESSION);
		session_destroy();
		self::$session = null;
	}
}

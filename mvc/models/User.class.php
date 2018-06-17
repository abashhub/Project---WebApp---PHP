<?php
class User {
	private $_login;
	private $_name;
	private $_surname;
	private $_password;
	public function __construct($login, $name, $surname, $password) {
		$this->_login = $login;
		$this->_name = $name;
		$this->_surname = $surname;
		$this->_password = $password;
	}
	public function login() {
		return $this->_login;
	}
	public function name() {
		return $this->_name;
	}
	public function surname() {
		return $this->_surname;
	}
	public function password() {
		return $this->_password;
	}
}
?>
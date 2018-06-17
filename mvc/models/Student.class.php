<?php
class Student {
	private $_serial;
	private $_name;
	private $_surname;
	private $_password;
	private $_last_login;
	public function __construct($serial, $name, $surname, $password, $last_login) {
		$this->_serial = $serial;
		$this->_name = $name;
		$this->_surname = $surname;
		$this->_password = $password;
		$this->_last_login = $last_login;
	}
	public function serial() {
		return $this->_serial;
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
	public function last_login() {
		return $this->_last_login;
	}
}
?>
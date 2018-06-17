<?php
class StudentsListController {
	public function __construct() {
	}
	public function run() {
		// if user not connected or user is not a teacher redirect to the login page
		if (empty ( $_SESSION ['authentification'] ) || $_SESSION ['authentification'] != 'teacher') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		$arrayStudents = Db::getInstance ()->select_students ();
		//$percentage = (int)Db::getInstance()->get_percentage(14192);
		
		// view : studentList.php
		require_once (VIEWS_PATH . 'studentsList.php');
	}
}
?>
<?php
class StudentController {
	public function __construct() {
	}
	public function run() {
		// if user not connected or user is not a teacher redirect to the login page
		if (empty ( $_SESSION ['authentification'] ) || $_SESSION ['authentification'] != 'teacher') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		$showArray = false;
		$serial;
		
		if ((! empty ( $_GET ['level'] )) && (! empty ( $_GET ['serial'] ))) {
			$serial = htmlentities ( $_GET ['serial'] );
			$level = htmlentities ( $_GET ['level'] );
			
			$query = 'SELECT DISTINCT qr.num_query, ex.answer FROM db_main.queries qr, db_main.exercice ex
					WHERE ex.id_query=qr.id AND ex.serial=' . $serial . ' AND qr.num_level=' . $level .'';
			$arrayAnswers = Db::getInstance()->select_answer($query);
					
			if (Db::getInstance ()->login_exists ( $serial )) {
				$arrayStudent = Db::getInstance ()->select_student ( $serial );
				$showArray = true;
			}
		}
		
		
		// view : student.php
		require_once (VIEWS_PATH . 'student.php');
	}
}
?>
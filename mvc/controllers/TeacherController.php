<?php 
class TeacherController{
		
	public function __construct(){	

	}
	
	public function run(){	
		// if user not connected or user is not a teacher redirect to the login page
		if (empty ( $_SESSION ['authentification'] ) || $_SESSION ['authentification'] != 'teacher') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		$username = $_SESSION['username'];
		
		// view : teacher.php 
		require_once(VIEWS_PATH . 'teacher.php');
	}
	
}
?>
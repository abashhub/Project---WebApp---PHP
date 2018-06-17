<?php
class QuestionsController {
	public function __construct() {
	}
	public function run() {
		// if user not connected redirect to the login page
		if (empty ( $_SESSION ['authentification'] )) {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		$level;
		$nbQuestions = 0;
		if (! empty ( $_GET ['level'] )) {
			$level = htmlentities ( $_GET ['level'] );
			$nbQuestions = Db::getInstance()->count_questions($level);
		}
		
		
		
		
		
		
		// view : question.php
		require_once (VIEWS_PATH . 'questions.php');
	}
	
	
	
}
?>
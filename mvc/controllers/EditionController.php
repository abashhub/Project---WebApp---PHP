<?php
class EditionController {
	public function __construct() {
	}
	public function run() {
		// if user not connected or user is not a teacher redirect to the login page
		if (empty ( $_SESSION ['authentification'] ) || $_SESSION ['authentification'] != 'teacher') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		
		if (! empty ( $_GET ['level'] ) && $_GET ['number']) {
			$level = htmlentities ( $_GET ['level'] );
			$number = htmlentities ( $_GET ['number'] );
		}
		
		//form edition query
		if (! empty ( $_POST )) {
			
			// update queries.last_modified_by 
			Db::getInstance()->update_query('last_modified_by', htmlentities ( $_SESSION ['login'] ), $level, $number);
			// update queries.last_modified_at
			$timeStamp = date ( "Y-m-d H:i:s" );
			Db::getInstance()->update_query('last_modified_at', $timeStamp, $level, $number);
			
			if ($_POST ['num_query'] != '') {
				Db::getInstance ()->update_query ( 'num_query', htmlentities ( $_POST ['num_query'] ), $level, $number );
			}
			
			if ($_POST ['theme'] != '') {
				Db::getInstance ()->update_query ( 'theme', htmlentities ( $_POST ['theme'] ), $level, $number );
			}
			if ($_POST ['question'] != '') {
				Db::getInstance ()->update_query ( 'question', htmlentities ( $_POST ['question'] ), $level, $number );
			}
			if ($_POST ['query'] != '') {
				Db::getInstance ()->update_query ( 'query', htmlentities ( $_POST ['query'] ), $level, $number );
			}
		}
		
		// initial query
		$exercice = array ();
		$exercice = Db::getInstance ()->select_query ( $level, $number );
		$last_modified_by = '';
		$last_modified_by = Db::getInstance()->get_name_user($exercice[0]->last_modified_by());
		
		
		// view : edition.php
		require_once (VIEWS_PATH . 'edition.php');
	}
}

?>
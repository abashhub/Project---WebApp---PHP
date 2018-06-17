<?php
class ExerciceController {
	public function __construct() {
	}
	public function run() {
		// if user not connected or user is not a student redirect to the login page
		if (empty ( $_SESSION ['authentification'] ) || $_SESSION ['authentification'] != 'student') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		$exercice = array ();
		
		if (! empty ( $_GET ['level'] ) && $_GET ['number']) {
			$level = htmlentities ( $_GET ['level'] );
			$number = htmlentities ( $_GET ['number'] );
			$nbquestions = Db::getInstance ()->count_questions ( $level );
			
			if (! empty ( $_POST ['quest_number'] )) {
				if ($_POST ['quest_number'] > $nbquestions) {
					$number = 1;
				} elseif ($_POST ['quest_number'] < 1) {
					$number = 1;
				} else {
					$number = htmlentities ( $_POST ['quest_number'] );
				}
			} elseif (! empty ( $_POST ['numQuestion'] )) {
				if ($_POST ['numQuestion'] > $nbquestions) {
					$number = 1;
				} elseif ($_POST ['numQuestion'] < 1) {
					$number = 1;
				} else {
					$number = htmlentities ( $_POST ['numQuestion'] );
				}
			}
			
			$exercice = Db::getInstance ()->select_query ( $level, $number );
			
			$correctAnswerExist = false;
			$query = 'SELECT answer FROM db_main.exercice WHERE id_query=' . $exercice [0]->id () . ' AND serial=' . $_SESSION ['login'] . '';
			if (Db::getInstance ()->row_count ( $query ) == 1) {
				$correctAnswerExist = true;
				$correctStudentQuery = Db::getInstance ()->select_answer ( $query );
			}
		}
		
		$error = '';
		$showAnswer = false;
		if (! empty ( $_POST ['studQuery'] )) {
			$showAnswer = true;
			try {
				$tabAnswer = Db::getInstance ()->select_answer ( htmlentities ( $_POST ['studQuery'] ) );
				$tabExpected = Db::getInstance ()->select_answer ( htmlentities ( $exercice [0]->query () ) );
				if ($exercice [0]->line_count () == Db::getInstance ()->row_count ( htmlentities ( $_POST ['studQuery'] ) )) {
					if (! $correctAnswerExist) {
						$query = 'INSERT INTO db_main.exercice (serial, id_query, answer) VALUES (' . $_SESSION ['login'] . ',' . $exercice [0]->id () . ',\'' . htmlentities ( $_POST ['studQuery'] ) . '\')';
						Db::getInstance ()->execute_query ( $query );
					} elseif (! empty ( $_POST ['update'] )) {
						$query = 'UPDATE db_main.exercice SET answer =\'' . htmlentities ( $_POST ['studQuery'] ) . '\' WHERE serial =' . $_SESSION ['login'] . ' AND id_query=' . $exercice [0]->id () . '';
						Db::getInstance ()->execute_query ( $query );
					}
				}
			} catch ( PDOException $e ) {
				$error = $e->getMessage ();
			}
		}
		
		// view : exercice.php
		require_once (VIEWS_PATH . 'exercice.php');
	}
}

?>
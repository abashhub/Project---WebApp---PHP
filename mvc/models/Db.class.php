<?php
class Db {
	private static $instance = null;
	private $_db;
	private function __construct() {
		try { // dbname=db_main;
			$this->_db = new PDO ( 'mysql:host=localhost;charset=UTF8', 'root', '' );
			$this->_db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->_db->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
		} catch ( PDOException $e ) {
			die ( 'Erreur de connexion à la base de données : ' . $e->getMessage () );
		}
	}
	
	// Pattern Singleton
	public static function getInstance() {
		if (is_null ( self::$instance )) {
			self::$instance = new Db ();
		}
		return self::$instance;
	}
	public function import_login() {
		$query = 'SELECT * FROM db_main.students';
		$result = $this->_db->query ( $query );
		// if students table empty insert data from etudiants.csv
		if ($result->rowcount () == 0) {
			$csvfile = 'models/etudiants.csv';
			$row = 0;
			
			// fopen : php file handler (r means opening for read only)
			if ($handle = fopen ( $csvfile, 'r' )) {
				// fgetcsv : fetch 1 full row at a time in the form of an array
				while ( $data = fgetcsv ( $handle, 1000, ';' ) ) { // (the file handle coming from fopen, max columns, delimiting character)
					if ($row > 0) { // skip the first row in csv file
						$query = 'INSERT INTO db_main.students ( serial, name, surname) VALUES (' . $this->_db->quote ( $data [0] ) . ',' . $this->_db->quote ( $data [1] ) . ',' . $this->_db->quote ( $data [2] ) . ')';
						$this->_db->prepare ( $query )->execute ();
					}
					$row ++;
				}
				fclose ( $handle ); // close the file handle
			}
		}
		
		$query = 'SELECT * FROM db_main.teachers';
		$result = $this->_db->query ( $query );
		// if teachers table empty insert data from professeurs.csv
		if ($result->rowcount () == 0) {
			$csvfile = 'models/professeurs.csv';
			$row = 0;
			
			if ($handle = fopen ( $csvfile, 'r' )) {
				while ( $data = fgetcsv ( $handle, 1000, ';' ) ) {
					if ($row > 0) { // skip the first row in csv file
						$query = 'INSERT INTO db_main.teachers (login,name,surname) VALUES (' . $this->_db->quote ( $data [0] ) . ',' . $this->_db->quote ( $data [1] ) . ',' . $this->_db->quote ( $data [2] ) . ')';
						$this->_db->prepare ( $query )->execute ();
					}
					$row ++;
				}
				fclose ( $handle );
			}
		}
	}
	public function import_queries($csvfile, $level) {
		$importSuccessful = false;
		$query = 'SELECT * FROM db_main.levels WHERE num_level=' . $this->_db->quote ( $level ) . '';
		$result = $this->_db->query ( $query );
		if ($result->rowcount () == 0) {
			
			$query = 'INSERT INTO db_main.levels VALUES (' . $level . ', \'Niveau ' . $level . '\')';
			$this->_db->prepare ( $query )->execute ();
			
			$row = 0;
			
			if ($handle = fopen ( $csvfile, 'r' )) {
				while ( $data = fgetcsv ( $handle, 1000, ';' ) ) {
					if ($row > 0) { // skip the first row in csv file
						$query = 'INSERT INTO db_main.queries (num_query,num_level,theme,question,query,line_count) 
								VALUES (' . $this->_db->quote ( $data [0] ) . ',' . $level . ',' . $this->_db->quote ( $data [1] ) . ',' . $this->_db->quote ( $data [2] ) . ',' . $this->_db->quote ( $data [3] ) . ',' . $this->_db->quote ( $data [4] ) . ')';
						$this->_db->prepare ( $query )->execute ();
					}
					$row ++;
				}
				fclose ( $handle );
				$importSuccessful = true;
			}
		}
		return $importSuccessful;
	}
	public function login_exists($login) {
		$exists = false;
		
		if (preg_match ( '/^[0-9]{4,5}$/', $login )) {
			$query = 'SELECT * FROM db_main.students WHERE serial=' . $this->_db->quote ( $login ) . '';
		} 

		elseif (preg_match ( '/^[a-z]{5}$/', $login )) {
			$query = 'SELECT * FROM db_main.teachers WHERE login=' . $this->_db->quote ( $login ) . '';
		}
		
		$result = $this->_db->query ( $query );
		if ($result->rowcount () != 0) {
			$exists = true;
		}
		
		return $exists;
	}
	public function password_null($login) {
		$verification = false;
		$query = '';
		if (preg_match ( '/^[0-9]{4,5}$/', $login )) {
			$query = 'SELECT * FROM db_main.students WHERE serial=' . $this->_db->quote ( $login ) . 'AND (password=\'\' OR password is NULL)';
		} 

		elseif (preg_match ( '/^[a-z]{5}$/', $login )) {
			$query = 'SELECT * FROM db_main.teachers WHERE login=' . $this->_db->quote ( $login ) . 'AND (password=\'\' OR password is NULL)';
		}
		
		if ($query != '') {
			$result = $this->_db->query ( $query );
			if ($result->rowcount () != 0) {
				$verification = true;
			}
		}
		return $verification;
	}
	public function update_password($login, $password) {
		$query = '';
		if (preg_match ( '/^[0-9]{4,5}$/', $login )) {
			$query = 'UPDATE db_main.students SET password=' . $this->_db->quote ( sha1 ( $password ) ) . 'WHERE serial=' . $this->_db->quote ( $login ) . '';
		} 

		elseif (preg_match ( '/^[a-z]{5}$/', $login )) {
			$query = 'UPDATE db_main.teachers SET password=' . $this->_db->quote ( sha1 ( $password ) ) . 'WHERE login=' . $this->_db->quote ( $login ) . '';
		}
		if ($query != '') {
			$this->_db->prepare ( $query )->execute ();
		}
	}
	public function authentication($login, $password) {
		$authenticated = false;
		$query = '';
		if (preg_match ( '/^[0-9]{4,5}$/', $login )) {
			$query = 'SELECT * FROM db_main.students WHERE serial=' . $this->_db->quote ( $login ) . ' AND password=' . $this->_db->quote ( sha1 ( $password ) );
		} 

		elseif (preg_match ( '/^[a-z]{5}$/', $login )) {
			$query = 'SELECT * FROM db_main.teachers WHERE login=' . $this->_db->quote ( $login ) . ' AND password=' . $this->_db->quote ( sha1 ( $password ) );
		}
		
		if ($query != '') {
			$result = $this->_db->query ( $query );
			if ($result->rowcount () != 0) {
				$authenticated = true;
			}
		}
		return $authenticated;
	}
	public function get_name_user($login) {
		$query = '';
		$name = '';
		$surname = '';
		if (preg_match ( '/^[0-9]{4,5}$/', $login )) {
			$query = 'SELECT name, surname FROM db_main.students WHERE serial=' . $this->_db->quote ( $login );
		} 

		elseif (preg_match ( '/^[a-z]{5}$/', $login )) {
			$query = 'SELECT name, surname FROM db_main.teachers WHERE login=' . $this->_db->quote ( $login );
		}
		if ($query != '') {
			$result = $this->_db->query ( $query );
			if ($result->rowcount () != 0) {
				$row = $result->fetch ( PDO::FETCH_ASSOC );
				$name = $row ['surname'] . ' ' . $row ['name'];
			}
		}
		return $name;
	}
	public function update_last_login($login, $time) {
		$query = 'UPDATE db_main.students SET last_login=' . $this->_db->quote ( $time ) . 'WHERE serial=' . $this->_db->quote ( $login ) . '';
		$this->_db->prepare ( $query )->execute ();
	}
	public function select_students() { // select all students
		$query = 'SELECT * FROM db_main.students ORDER BY name';
		$result = $this->_db->query ( $query );
		$array = array ();
		if ($result->rowCount () != 0) {
			while ( $row = $result->fetch () ) {
				$array [] = new Student ( $row->serial, $row->name, $row->surname, $row->password, $row->last_login );
			}
		}
		return $array;
	}
	public function select_student($serial) { // select one student
		$query = 'SELECT * FROM db_main.students WHERE serial=' . $this->_db->quote ( $serial ) . '';
		$result = $this->_db->query ( $query );
		$array = array ();
		if ($result->rowCount () != 0) {
			while ( $row = $result->fetch () ) {
				$array [] = new Student ( $row->serial, $row->name, $row->surname, $row->password, $row->last_login );
			}
		}
		return $array;
	}
	public function count_levels() {
		$query = 'SELECT * FROM db_main.levels';
		$result = $this->_db->query ( $query );
		return $result->rowCount ();
	}
	public function count_questions($level) {
		$query = 'SELECT * FROM db_main.queries WHERE num_level =' . $level . '';
		$result = $this->_db->query ( $query );
		return $result->rowCount ();
	}
	public function select_query($level, $num_query) {
		$query = 'SELECT * FROM db_main.queries WHERE num_level=' . $level . ' AND num_query=' . $num_query . '';
		$result = $this->_db->query ( $query );
		$array = array ();
		if ($result->rowCount () != 0) {
			while ( $row = $result->fetch () ) {
				$array [] = new Query ( $row->id, $row->num_query, $row->num_level, $row->theme, $row->question, $row->query, $row->line_count, $row->last_modified_by, $row->last_modified_at );
			}
		}
		return $array;
	}
	public function update_query($parameter, $value, $level, $number) {
		$query = 'UPDATE db_main.queries SET ' . $parameter . '=' . $this->_db->quote ( $value ) . 'WHERE num_level=' . $this->_db->quote ( $level ) . ' AND num_query=' . $this->_db->quote ( $number ) . '';
		$this->_db->prepare ( $query )->execute ();
	}
	public function get_percentage($serial) {
		$query = 'SELECT id_query FROM db_main.exercice WHERE serial=' . $this->_db->quote ( $serial ) . '';
		$result = $this->_db->query ( $query );
		$correctAnswers = $result->rowCount ();
		
		$query2 = 'SELECT id FROM db_main.queries';
		$result2 = $this->_db->query ( $query2 );
		$totalQueries = $result2->rowCount ();
		return (($correctAnswers / $totalQueries) * 100);
	}
	public function select_answer($query) {
		$result = $this->_db->query ( $query );
		$array = array ();
		if ($result->rowCount () == 0) {
		} else {
			$i = $result->rowCount ();
			while ( $row = $result->fetch () ) {
				$array [] = $row;
			}
		}
		return $array;
	}
	public function row_count($query) {
		$result = $this->_db->query ( $query );
		return $result->rowCount ();
	}
	public function execute_query($query) {
		$this->_db->prepare ( $query )->execute ();
	}
	public function check_level($level) {
		$empty = true;
		$query = 'SELECT * from db_main.queries WHERE num_level =' . $level;
		$result = $this->_db->query ( $query );
		if ($result->rowCount () == 0) {
			$empty = true;
		} else {
			$empty = false;
		}
		return $empty;
	}
	public function select_level($level) {
		$query = 'SELECT * from db_main.queries WHERE num_level =' . $level;
		$result = $this->_db->query ( $query );
		$tableau = array ();
		if ($result->rowCount () == 0) {
		} else {
			$i = $result->rowCount ();
			while ( $row = $result->fetch () ) {
				$tableau [] = $row;
			}
		}
		return $tableau;
	}
	public function convert_to_csv($tabqueries, $csvfile, $delimiter) {
		header ( 'Content-Type: application/csv; charset=utf-8' );
		header ( 'Content-Disposition: attachment; filename="' . $csvfile . '";' );
		header ( 'Pragma: no-cache' );
		header ( 'Expires: 0' );
		$fp = fopen ( 'php://output', 'w' );
		ob_get_clean ();
		$row = 0;
		foreach ( $tabqueries as $line ) {
			if ($row == 0) {
				$query = 'id' . $delimiter . 'num_query' . $delimiter . 'num_level' . $delimiter . 'theme' . $delimiter . 'question' . $delimiter . 'query' . $delimiter . 'line_count'. "\n";
			} else {
				$query = $line->id . $delimiter . $line->num_query . $delimiter . $line->num_level . $delimiter . $line->theme . $delimiter . $line->question . $delimiter . $line->query . $delimiter . $line->line_count . "\n";
			}
			$row ++;
			fwrite ( $fp, $query );
		}
		fclose ( $fp );
		exit ();
	}
}

?>
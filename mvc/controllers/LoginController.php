<?php
class LoginController {
	public function __construct() {
	}
	public function run() {
		// if user already connected redirect to user home page
		if (! empty ( $_SESSION ['authentification'] )) {
			if ($_SESSION ['authentification'] == 'student')
				header ( "Location: index.php?action=levels" );
			else
				header ( "Location: index.php?action=" . $_SESSION ['authentification'] );
			die ();
		}
		
		// initial notification
		$notification = 'Authentifiez-vous';
		
		if (! empty ( $_POST )) {
			
			if (empty ( $_POST ['username'] ) && empty ( $_POST ['password'] )) {
				$notification = 'Entrez un login et mot de passe non vides!';
			} elseif (empty ( $_POST ['username'] )) {
				$notification = 'Entrez un login non vide!';
			} elseif (empty ( $_POST ['password'] )) {
				$notification = 'Entrez un mot de passe non vide!';
			} elseif (preg_match ( '/^[0-9]{4,5}$/', $_POST ['username'] ) || preg_match ( '/^[a-z]{5}$/', $_POST ['username'] )) {
				
				$login = htmlentities ( $_POST ['username'] );
				$password = htmlentities ( $_POST ['password'] );
				
				if (Db::getInstance ()->login_exists ( $login )) {
					
					// if new user update db with the password user entered
					if (Db::getInstance ()->password_null ( $login )) {
						Db::getInstance ()->update_password ( $login, $password );
					}
					
					// authentication
					if (Db::getInstance ()->authentication ( $login, $password )) {
						
						// create session username and copy login
						$_SESSION ['username'] = Db::getInstance ()->get_name_user ( $login );
						$_SESSION ['login'] = $login;
						
						if (preg_match ( '/^[0-9]{4,5}$/', $login )) { // login match student
							$login_time = date ( "Y-m-d H:i:s" );
							Db::getInstance ()->update_last_login ( $login, $login_time );
							$_SESSION ['authentification'] = 'student';
							// Redirection HTTP to ask the student's home page
							header ( "Location: index.php?action=levels" );
							die ();
						} 

						else { // login match teacher
							$_SESSION ['authentification'] = 'teacher';
							// Redirection HTTP to ask the teacher's home page
							header ( "Location: index.php?action=teacher" );
							die ();
						}
					}
				}
				
				// in case login doesn't exist in db or incorrect paswsord
				$notification = 'Nom d\'utilisateur et/ou mot de passe incorrecte(s).';
			} else { // in case login doesn't match preg_match
				$notification = 'Nom d\'utilisateur et/ou mot de passe incorrecte(s).';
			}
		}
		// view : login.php
		require_once (VIEWS_PATH . 'login.php');
	}
}

?>
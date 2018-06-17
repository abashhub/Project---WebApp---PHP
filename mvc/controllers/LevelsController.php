<?php
class LevelsController {
	public function __construct() {
	}
	public function run() {
		// if user not connected redirect to the login page
		if (empty ( $_SESSION ['authentification'] )) {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		$levelsCount = Db::getInstance()->count_levels();
		$showArray = false;
		
		
		
		if ($_SESSION ['authentification'] == 'teacher' && (! empty ( $_GET ['serial'] ))) {
			$serial = htmlentities ( $_GET ['serial'] );
			if (Db::getInstance ()->login_exists ( $serial )) {
				$arrayStudent = Db::getInstance ()->select_student ( $serial );
				$showArray = true;
			}
		}
		
		// view : levels.php
		require_once (VIEWS_PATH . 'levels.php');
	}
}
?>
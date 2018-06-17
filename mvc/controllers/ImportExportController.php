<?php
class ImportExportController {
	public function __construct() {
	}
	public function run() {
		// if user not connected or user is not a teacher redirect to the login page
		if (empty ( $_SESSION ['authentification'] ) || $_SESSION ['authentification'] != 'teacher') {
			header ( 'Location: index.php?action=login' );
			die ();
		}
		
		$level = '';
		$importSuccessful = false;
		$notification = '';
		
		if (! empty ( $_POST ['import'] )) {
			if (empty ( $_POST ['level'] )) {
				$notification = "Veuillez introduire le numéro du niveau à importer.";
			} elseif (empty ( $_FILES ['queries'] ['tmp_name'] )) {
				$notification = "Veuillez choisir un fichier.";
			} else {
				$name = $_FILES ['queries'] ['name'];
				$origin = $_FILES ['queries'] ['tmp_name'];
				$destination = 'models/' . $name;
				move_uploaded_file ( $origin, $destination );
				$csvfile = 'models/' . $name;
				$level = htmlentities ( $_POST ['level'] );
				$importSuccessful = Db::getInstance ()->import_queries ( $csvfile, $level );
				if ($importSuccessful) {
					$notification = "Le fichier a été importer";
				} else {
					$notification = "Le fichier n'a pas pu etre inporter.";
				}
			}
		}
		
		$notificationExport = '';
		
		if (! empty ( $_POST ['export'] )) {
			if (empty ( $_POST ['levelToExport'] )) {
				$notificationExport = "Veuillez introduire le numéro du niveau à exporter.";
			} else {
				$checklevel = Db::getInstance ()->check_level ( $_POST ['levelToExport'] );
				if ($checklevel) {
					$notificationExport = "Ce niveau est vide, veuillez choisir un autre niveau.";
				} else {
					$tabqueries = Db::getInstance ()->select_level ( $_POST ['levelToExport'] );
					$csvfile = "exportedLevel_" . $_POST ['levelToExport'] . ".csv";
					Db::getInstance ()->convert_to_csv ( $tabqueries, $csvfile, ";" );
				}
			}
		}
		
		// view : importExport.php
		require_once (VIEWS_PATH . 'importExport.php');
	}
}
?>
<?php
session_start ();

// global variables of website
define ( 'VIEWS_PATH', 'views/' );
define ( 'SESSION_ID', session_id () );

// required of automated class
function loadClass($class) {
	require 'models/' . $class . '.class.php';
}
spl_autoload_register ( 'loadClass' );

// if table students & teacher empty in db_main
// import etudiant.csv & professeurs.csv
Db::getInstance ()->import_login ();

// common header of all views
require_once (VIEWS_PATH . 'header.php');

$action = (isset ( $_GET ['action'] )) ? htmlentities ( $_GET ['action'] ) : 'default';

switch ($action) {
	
	case 'teacher' :
		require_once ('controllers/TeacherController.php');
		$controller = new TeacherController ();
		break;
	case 'levels' :
		require_once ('controllers/LevelsController.php');
		$controller = new LevelsController ();
		break;
	case 'questions' :
		require_once ('controllers/QuestionsController.php');
		$controller = new QuestionsController ();
		break;
	case 'logout' :
		require_once ('controllers/LogoutController.php');
		$controller = new LogoutController ();
		break;
	case 'studentsList' :
		require_once ('controllers/StudentsListController.php');
		$controller = new StudentsListController ();
		break;
	case 'student' :
		require_once ('controllers/StudentController.php');
		$controller = new StudentController ();
		break;
	case 'exercice' :
		require_once ('controllers/ExerciceController.php');
		$controller = new ExerciceController ();
		break;
	case 'edition' :
		require_once ('controllers/EditionController.php');
		$controller = new EditionController ();
		break;
	case 'importExport' :
		require_once ('controllers/ImportExportController.php');
		$controller = new ImportExportController ();
		break;
	default : // default controller : login page selected
		require_once ('controllers/LoginController.php');
		$controller = new LoginController ();
		break;
}
$controller->run ();

// common footer of all views
require_once (VIEWS_PATH . 'footer.php');
?>
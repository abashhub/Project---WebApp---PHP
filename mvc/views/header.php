<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>IPL - IANARCH</title>
		<meta name = "description" content = "excices requete sql">
		<meta name = "author" content = "Ahmad Bashir, Nyeem Mohammad">
		<meta name = "keywords" content = "sql, ianarch, ipl, query, requete">
		<link type="text/css" rel="stylesheet"  href= <?php echo VIEWS_PATH . "css/base.css"?> media="all" >		
	</head>
	<body>
		<header>
			<h1><a href="index.php">IANARCH - SQL</a></h1>
			<nav>
				<ul>
				<?php 
					if ( !empty($_SESSION['authentification'])){
						if ($_SESSION['authentification']=='teacher'){
				?> 
							<li><a href="index.php?action=teacher">Accueil</a></li>
							<li><a href="index.php?action=studentsList">Liste des étudiants</a></li>
							<li><a href="index.php?action=importExport">Import/Export queries</a>
							<li><a href="index.php?action=levels">Modifier les questions</a></li>
							<li><a href="index.php?action=logout">Deconnexion</a></li>
				
				<?php
						}
						else{
				?>
							<li><a href="index.php?action=levels">Accueil</a></li>
							<li><a href="index.php?action=logout">Deconnexion</a></li>
				
				<?php 			
						}
					}
				?>
				</ul>
			</nav>
		</header> 
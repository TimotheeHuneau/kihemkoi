<?php // contrôleur frontal
session_start();

require('inc/constantes.php');
require('inc/routes.php');
require('inc/modele.php');
require('inc/fonctions.php');

if(!(isset($_SESSION['auth']))){
	$_SESSION['auth'] = false;
}

$titrePage = 'Kihemkoi &#x1F49C '; //pre-set des valeurs des chemins des fichiers

if(isset($_GET['page'])) { //on détermine quelle page est demandée
	$nomPage = $_GET['page'];
}else{
	$nomPage = 'accueil';
}
if(!isset($routes[$nomPage])) { //si la page demandée est définie, on crée les chemins
	$nomPage = "accueil";
}

$controleur = $routes[$nomPage]['controleur'];
$vue = $routes[$nomPage]['vue'];
$aside = $routes[$nomPage]['aside'];
$script = $routes[$nomPage]['script'];

$cheminControleur = "controleurs/$controleur.php";
$cheminVue = "vues/$vue.php";
$cheminAside = "asides/$aside.php";
$cheminScript = "scripts/$script.js";
$titrePage = $titrePage . $routes[$nomPage]['nom'];
	

include($cheminControleur); //on charge le controlleur avant tout affichage de HTML

?>

<!DOCTYPE html> <!--Définit la structure grossière de la page, ainsi que le meta-->
<html>
	<head>
		<meta charset='utf-8'/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $titrePage ?></title>
		<link rel='stylesheet' href='style.css' type='text/css'/>
		<script src="<?= $cheminScript ?>"></script>
		<link rel="icon" href="contenus/icone.svg" />
	</head>
	<body>
		<?php
			include("static/entete.php"); //chargement des éléments statiques et de la vue
		?>
		<div id="central">
		<?php
			include("static/menu.php");
			include($cheminVue);
			include($cheminAside);
		?>
		</div>
		<?php
			include("static/footer.php");
		?>
	</body>
</html>

<?php 

function seConnecter() {
	if($_SESSION['auth']){
		$connexion = mysqli_connect(SERVEUR, SUPER_UTILISATRICE, SUPER_MOTDEPASSE, BDD);
	}
	else{
		$connexion = mysqli_connect(SERVEUR, UTILISATRICE_PAR_DEFAUT, MOTDEPASSE_PAR_DEFAUT, BDD);
	}
	if (mysqli_connect_errno()) {
	    echo "<script>console.log('Echec de la connexion à la base');</script>";
		exit();
	}
	mysqli_set_charset($connexion,'utf8');
	return $connexion;
}

// déconnexion de la BD
function deconnectBD($connexion) {
	mysqli_close($connexion);
}

function getAllIngredients(){
	$c = seConnecter();
	$requete = "
		SELECT *
		FROM Ingredient
		ORDER BY nom;
	";
	$resultatIngredients = mysqli_query($c, $requete);
	$listeIngredients = [];
	while($ingredient = mysqli_fetch_assoc($resultatIngredients)){
		$listeIngredients[$ingredient['id']] = $ingredient;
	}
	deconnectBD($c);
	return $listeIngredients;
}

function getAllHumains(){
	$c = seConnecter();
	$requete = "
		SELECT *
		FROM Humain
		ORDER BY nom;
	";
	$resultatHumains = mysqli_query($c, $requete);
	$listeHumains = [];
	while($humain = mysqli_fetch_assoc($resultatHumains)){
		$listeHumains[$humain['id']] = $humain;
	}
	deconnectBD($c);
	return $listeHumains;
}

?>

<?php
$c = seConnecter(); 

//recuperation des personnes
$listeHumains = getAllHumains();

if(isset($_POST['aime'])){
	$aAime = $_POST['aime'];
	foreach($aAime as $idIngredient => $relIngredient){
		foreach($relIngredient as $idHumain => $niveau){
			$reqVidage = "DELETE FROM Aime WHERE humain = $idHumain AND ingredient = $idIngredient;";
			mysqli_query($c, $reqVidage);
			if($niveau != 0){
				$reqAime = "INSERT INTO Aime (ingredient, humain, niveau) VALUES ($idIngredient, $idHumain, $niveau);";
				mysqli_query($c, $reqAime);
			}
		}
	}
	
}

//recuperation des recettes
$requeteListeRecettes = "
SELECT i.id idIngredient, i.nom nom, a.niveau niveau, a.humain humain
FROM Ingredient i LEFT JOIN Aime a ON i.id = a.ingredient
ORDER BY nom;";
$resultatListeIngredient = mysqli_query($c, $requeteListeRecettes);
$aAimeHumain = [];
while ($relation = mysqli_fetch_assoc($resultatListeIngredient)){
	$idIngredient = $relation['idIngredient'];
	if (!isset($aAimeHumain[$idIngredient])){
		$aAimeHumain[$idIngredient] = array('nom' => $relation['nom'], 'aime' => []);
	}
	if ($idHumain = $relation['humain']){
		$aAimeHumain[$idIngredient]['aime'][$idHumain] = $relation['niveau'];
	}
}


deconnectBD($c);
?> 

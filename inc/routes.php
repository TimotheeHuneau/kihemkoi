<?php
	$routes = array(
		'accueil' => array(
			'controleur' => 'cAccueil',
			'vue' => 'vAccueil',
			'nom' => '',
			'aside' => 'void',
			'script' => 'sAccueil'
		),
		
		'ajouterPersonne' => array(
			'controleur' => 'cAjouterPersonne',
			'vue' => 'vAjouterPersonne',
			'nom' => ' - Ajouter une personne',
			'aside' => 'void',
			'script' => 'void'
		),
		
		'connexion' => array(
			'controleur' => 'cConnexion',
			'vue' => 'vConnexion',
			'nom' => ' - Connexion',
			'aside' => 'void',
			'script' => 'void'
		),
		
		'test' => array(
			'controleur' => 'cTests',
			'vue' => 'vTests',
			'nom' => 'Tests',
			'aside' => 'void',
			'script' => 'void'
		)
	);
?>
<?php
header('Content-Type: text/html; charset=utf-8');
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$DB = new PDO('mysql:host=localhost;port=3308;dbname=wikicomp;charset=utf8mb4', 'root', '', $pdo_options);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
try
{
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$laboratoire = htmlspecialchars($_POST['laboratoire']);
	$query = "SELECT id_chercheur FROM chercheur WHERE nom LIKE '%$nom%' and laboratoire like '%$laboratoire%' and prenom like '%$prenom%' ;";
	$resultat = $DB->query($query);
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
			$doublon = $donnees['id_chercheur'];
		}
	if(!empty($doublon)){
		header("Location: Ajout.php?error=doublon");
	}
	else{
		// Insertion dans la base de donnée	
		$statement = $DB->prepare("INSERT INTO chercheur (nom, prenom, laboratoire) VALUES (:nom, :prenom,:laboratoire)");
		$statement->execute(array("nom" => $_POST['nom'], "prenom" => $_POST['prenom'], "laboratoire" => $_POST['laboratoire']));
		// Redirection vers la page d'accueil
		header("Location: Ajout.php?nom=$nom&prenom=$prenom");
	}
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>
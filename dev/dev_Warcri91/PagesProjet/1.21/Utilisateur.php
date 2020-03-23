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
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$password_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$query = "SELECT id_utilisateur FROM utilisateur WHERE mail like '%$mail%';";
	$resultat = $DB->query($query);
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
			$doublon = $donnees['id_utilisateur'];
		}
	if(!empty($doublon)){
		header("Location: Connexion.php?error=doublon");
	}
	else{
		// Insertion dans la base de donnée	
		$statement = $DB->prepare("INSERT INTO utilisateur (nom, prenom, mail, password, habilitation) VALUES (:nom, :prenom,:mail, :password, :habilitation)");
		$statement->execute(array("nom" => $_POST['nom'], "prenom" => $_POST['prenom'], "mail" => $_POST['mail'], "password" => $password_hache, "habilitation" => 1));
		// Redirection vers la page d'accueil
		header("Location: Accueil.php");
	}
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>
<?php
/*$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$laboratoire = $_POST['laboratoire'];
$mail = $_POST['mail'];
$habilitation = $_POST['habilitation'];
$password = $_POST['password'];*/

try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$DB = new PDO('mysql:host=localhost;port=3308;dbname=wikicomp', 'root', '', $pdo_options);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

try

{

	// Insertion dans la base de donnée	

	$statement = $DB->prepare("INSERT INTO utilisateur (nom, prenom, laboratoire, mail, photo, habilitation, password) VALUES (:nom, :prenom,:laboratoire,:mail,:photo, :habilitation,:password)");

	$statement->execute(array("nom" => $_POST['nom'], "prenom" => $_POST['prenom'], "laboratoire" => $_POST['laboratoire'], "mail" => $_POST['mail'], "photo" => $_POST['photo'], "habilitation" => $_POST['habilitation'], "password" => $_POST['password']));

   												

	// Redirection vers la page d'accueil

	header("Location: select_bdd_pdo.php");

}
catch(Exception $e)

{

	die('Erreur : '.$e->getMessage());

}




?>
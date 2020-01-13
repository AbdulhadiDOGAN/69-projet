<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$laboratoire = $_POST['laboratoire'];
$mail = $_POST['mail'];
$habilitation = $_POST['habilitation'];
$password = $_POST['password'];
$id_utilisateur = $_POST['id_utilisateur'];
echo "$nom ";

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

	$statement = $DB->prepare("UPDATE utilisateur SET nom='$nom', prenom='$prenom', laboratoire='$laboratoire', mail='$mail', habilitation=$habilitation, password='$password' WHERE id_utilisateur=$id_utilisateur;");

	$statement->execute();

   												

	// Redirection vers la page d'accueil

	header("Location: select_bdd_pdo.php");

}
catch(Exception $e)

{

	die('Erreur : '.$e->getMessage());

}




?>
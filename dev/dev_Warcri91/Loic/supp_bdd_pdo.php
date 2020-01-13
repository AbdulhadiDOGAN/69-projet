<?php


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

	$query = "DELETE FROM relation WHERE relation.utilisateur_id=:id_utilisateur;";
	$statement = $DB->prepare($query);
	$statement->execute(array("id_utilisateur" => $_GET['id_utilisateur']));
	$statement->execute();
	$statement->CloseCursor();
	$query = "DELETE FROM utilisateur WHERE utilisateur.id_utilisateur=:id_utilisateur;";
	$statement = $DB->prepare($query);
	$statement->execute(array("id_utilisateur" => $_GET['id_utilisateur']));
	$statement->execute();

	//echo $_GET['id_utilisateur'];
	// Redirection vers la page d'accueil

	header("Location: select_bdd_pdo.php");

}
catch(Exception $e)

{

	die('Erreur : '.$e->getMessage());

}



?>
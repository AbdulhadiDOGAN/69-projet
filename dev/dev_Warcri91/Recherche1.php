<?php
$toto = $_POST['toto'];

$i = 1;
$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 $query = "SELECT * FROM utilisateur WHERE habilitation = $toto;";

$resultat = $bdd->query($query);
 
echo 'Il y a '. $resultat->rowCount() . ' entrée(s) dans la base de données : </br>';
while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
	echo $donnees['nom'] . '</br>';
}

?>


 
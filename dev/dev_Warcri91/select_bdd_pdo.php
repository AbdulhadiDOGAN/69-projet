<?php
$i = 1;
$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 
$resultat = $bdd->query('SELECT * FROM utilisateur');
 
echo 'Il y a '. $resultat->rowCount() . ' entrée(s) dans la base de données : </br>';
 
while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
    //echo '<table> <tr> <td>' . $donnees['id_utilisateur'] . '</td><td> '.$donnees['nom']. '</td><td> '.$donnees['prenom']. '</td><td> '.$donnees['laboratoire']. '</td><td> '.$donnees['mail']. '</td><td> '.$donnees['photo']. '</td><td> '.$donnees['habilitation']. '</td><td> '.$donnees['password'].'</td></tr></table></br>';
    $id_utilisateur[$i] = $donnees['id_utilisateur'];
    $nom[$i] = $donnees['nom'];
    $prenom[$i] = $donnees['prenom'];
    $laboratoire[$i] = $donnees['laboratoire'];
    $mail[$i] = $donnees['mail'];
    $photo[$i] = $donnees['photo'];
    $habilitation[$i] = $donnees['habilitation'];
    $password[$i] = $donnees['password'];
    $i++;
}
$resultats = $bdd->query('SELECT nom, nom_competence FROM utilisateur,relation,competence WHERE id_utilisateur=utilisateur_id and id_competence=competence_id;');
while($donnees = $resultats->fetch(PDO::FETCH_ASSOC)) {
	echo $donnees['nom'] . ' => ' . $donnees['nom_competence'] . '</br>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SELECT BDD PDO</title>
	<style type="text/css">
		td{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<td>id_utilisateur</td>
			<td>nom</td>
			<td>prenom</td>
			<td>laboratoire</td>
			<td>mail</td>
			<td>photo</td>
			<td>habilitation</td>
			<td>password</td>
		</tr>
<?php
	for ($j=1; $j < $i ; $j++) { 
		echo "<tr>";
		echo "<td>$id_utilisateur[$j] </td>";
		echo "<td>$nom[$j] </td>";
		echo "<td>$prenom[$j] </td>";
		echo "<td>$laboratoire[$j] </td>";
		echo "<td>$mail[$j] </td>";
		echo "<td>$photo[$j]</td>";
		echo "<td>$habilitation[$j] </td>";
		echo "<td>$password[$j] </td>";
		echo "</tr>";
	}
?>
	</table>

<a href="insert_bdd_pdo.html">Retour vers formulaire</a>
<a href="Recherche.php">Recherche pas theme</a>

</body>
</html>
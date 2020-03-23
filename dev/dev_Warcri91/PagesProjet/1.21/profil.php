<?php
header('Content-Type: text/html; charset=utf-8');
	$id = $_GET['id'];
	$i = 0;
	$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$query = "SELECT * FROM chercheur WHERE id_chercheur=$id ;";
 	//echo "$query ";
		$resultat = $bdd->query($query);
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
			$id = $donnees['id_chercheur'];
    		$nom = $donnees['nom'];
    		$prenom = $donnees['prenom'];
    		$laboratoire = $donnees['laboratoire']; 
    		//echo "$id $nom $prenom $laboratoire"; 
		}
	$statement = "SELECT competence.nom_competence AS comp FROM relation, competence, chercheur WHERE relation.competence_id=competence.id_competence AND chercheur.id_chercheur=relation.chercheur_id AND chercheur.id_chercheur=$id";
	$resultat = $bdd->query($statement);
	while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
		$Tabcomp[$i] = $row['comp'];
		$i++;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<link href="./img/favicon.png" rel="shortcut icon"/>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="profil.css">
</head>
<body>
	<div class="contener">
	<?php include("entete.php"); ?>
	<div id="corp">
		<div id="contener-element">
			<div class="element">
				<?php echo "$prenom $nom"; ?>
			</div>
			<div class="element">
				<?php echo "($laboratoire)"; ?>
			</div>
			<div class="element-comp">
				<?php  
					for ($j=0; $j < $i; $j++) { 
						$red = (rand(0,50)/100)*255;
						$green = (rand(0,50)/100)*255;
						$blue = (rand(0,50)/100)*255;
						echo "<div class=\"competence-element\" style=\"background-color:rgb($red, $green, $blue,0.5)\">$Tabcomp[$j]</div>";
					}
					if($i == 0){
						$red = (rand(0,50)/100)*255;
						$green = (rand(0,50)/100)*255;
						$blue = (rand(0,50)/100)*255;
						echo "<div class=\"competence-element\" style=\"background-color:rgb($red, $green, $blue,0.5)\">Aucune compétences trouvées</div>";
					}
				?>
			</div>
			<div class="element">
				<form method="POST" action="change_comp.php">
					<?php 
					echo "<input type=\"text\" name=\"id\" value=\"$id\" hidden=\"\">";
					?>
					<input type="submit" name="sub" value="Modifier compétences" id="submit">
				</form>
			</div>
		</div>
	</div>
	<?php include("pied_de_page.php"); ?>
</div>
</body>
</html>
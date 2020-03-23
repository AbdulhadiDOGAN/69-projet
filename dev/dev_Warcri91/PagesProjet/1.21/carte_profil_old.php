<?php
header('Content-Type: text/html; charset=utf-8');
if(!empty($_POST['toto'])){
	$toto = $_POST['toto'];
	$i = 1;
	$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$query = "SELECT * FROM chercheur WHERE nom LIKE '%$toto%' or laboratoire like '%$toto%' ;";
 	//echo "$query ";
	if(!empty($query)){
		$resultat = $bdd->query($query);
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
    		$nom[$i] = $donnees['nom'];
    		$prenom[$i] = $donnees['prenom'];
    		$laboratoire[$i] = $donnees['laboratoire'];  
    		$i++;
		}
	}
	$z=0;
	$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$query = "SELECT nom_competence FROM competence, relation, chercheur WHERE id_competence = competence_id and id_chercheur = chercheur_id ;";
	//echo "$query ";
	$resultat = $bdd->query($query);
	while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
    	$nom_competence[$z] = $donnees['nom_competence']; 
    	$z++;
	    $test = $donnees['nom_competence']; 
	}
}

/************* FIN TRAITEMENT PHP *************/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="carte_profil.css">
</head>
<body>
    <div class="contener">
    <?php include("entete_search.php"); ?>
	<div class="toggle-wrapper">
		<input id="provide-muffins" onclick="myFunction()" name="provide_muffins" class="toggle" type="checkbox" checked />
  		<label for="provide-muffins" class="toggle--label"></label>
  		<div class="foux-toggle"></div>
	</div>
	<div id="recherche" style="display: none" >
        <table id="table1" class="greenTable" class="display"  cellpadding="0" cellspacing="15px;">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Labo</th>
        </tr>
    </thead>
    <tbody>
	<?php

/************* TABLEAU *************/

	if(!empty($query)){
		for ($j=1; $j < $i ; $j++) { 
    		echo "<tr>";
	    	echo "<td>$nom[$j] </td>";
    		echo "<td>$prenom[$j] </td>";
	    	echo "<td>$laboratoire[$j] </td>";
    		echo "</tr>";
  		}
	}
?>
	</tbody>
	</table>
</div>

<?php

/************* CARTE PROFIL *************/
     
for ($j=1; $j < $i ; $j++) { 
	$red = (rand(0,100)/100)*255;
	$green = (rand(0,100)/100)*255;
	$blue = (rand(0,100)/100)*255;
	echo "<div  class=\"container page-container\">
			<div id=\"toto1\" class=\"row gutters\">
    			<div class=\"toto\" >
    				<figure style =\"border-top: 3px solid rgb($red, $green, $blue,1)\"  class=\"user-card \">
						<figcaption>
							<img src=\"./img/icons8-utilisateur-96.png\" alt=\"Milestone Admin\" class=\"profile\">
							<h5> $prenom[$j]  $nom[$j]</h5>
							<h6></h6>			
							<p>Laboratoire $laboratoire[$j] </p>
							<ul class=\"contacts\">
								<li>
									<a href=\"#\"> </a>
								</li>
								<li>
									<p> 06484585443 </p>
								</li>
							</ul>
							<div class=\"clearfix\">";
    for ($r=0; $r < $z ; $r++) { 
        echo"				<span class=\"badge badge-pill badge-success\">$nom_competence[$r]</span>";
    }
	echo"					</div>
						</figcaption>
					</figure>
				</div> ";
}
echo"		</div>
		</div>";

?>
	</body>
</html>

<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("toto1");
  var x1 = document.getElementById("recherche");

  if (x.style.display === "none") {
    x.style.display = "block";
    x1.style.display = "none";
    
  } else {
    x.style.display = "none";
    x1.style.display = "block";
   
  }  
}
</script>
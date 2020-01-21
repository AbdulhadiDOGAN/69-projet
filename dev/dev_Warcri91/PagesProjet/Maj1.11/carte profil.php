<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Page de Recherche</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="profil.css">
</head>
<body>
    <div class="contener">
    <div id="entete">
        <div class="element-entete"><img src="./img/mainpage_logo.png" style="max-width: 50px;max-height: 50px;"></div>
        <form method="post" action="" >
        <div class="element-entete"><input type="text" name="toto" placeholder="Recherche" id="text-recherche"></div>   
        </form>
        
        <div class="element-entete"> <a  href="Accueil.html">Accueil </a></div>
        <div class="element-entete">Ajout</div>
        <div class="element-entete">Connexion</div>
        <div class="element-entete">Contact</div>
        <div class="element-entete"><img src="./img/utilisateur.png" style="max-width: 30px;max-height: 30px;"></div>
    </div>

    <div class="toggle-wrapper">

  <input id="provide-muffins" onclick="myFunction()" name="provide_muffins" class="toggle" type="checkbox" checked />
  <label for="provide-muffins" class="toggle--label"></label>
  <div class="foux-toggle"></div>
</div>
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
     <?php
if(!empty($_POST['toto']))
{
$toto = $_POST['toto'];
echo $toto;
$i = 1;
$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 $query = "SELECT * FROM utilisateur WHERE nom LIKE '%$toto%' or laboratoire like '%$toto%' or habilitation like '%$toto%'  ;";
 //echo "$query ";
if(!empty($query))
{
$resultat = $bdd->query($query);
 

while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
    $id_utilisateur[$i] = $donnees['id_utilisateur'];
    $nom[$i] = $donnees['nom'];
    $prenom[$i] = $donnees['prenom'];
    $laboratoire[$i] = $donnees['laboratoire'];
    $mail[$i] = $donnees['mail'];
    $photo[$i] = $donnees['photo'];
    $habilitation[$i] = $donnees['habilitation'];
    $password[$i] = $donnees['password'];
    $telephone[$i] = $donnees['telephone'];
    $i++;
 
}
}
}
?>

<div id="recherche" style="display: none" >
            <table id="table1" class="greenTable" class="display"  cellpadding="0" cellspacing="15px;">
    <thead>
        <tr>
            <th>Id_Utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Labo</th>
            <th>Mail</th>
            <th>Habilitation</th>
        </tr>
    </thead>
    <tbody>
        <?php
if(!empty($query))
{
  for ($j=1; $j < $i ; $j++) { 
    echo "<tr>";
    echo "<td>$id_utilisateur[$j] </td>";
    echo "<td>$nom[$j] </td>";
    echo "<td>$prenom[$j] </td>";
    echo "<td>$laboratoire[$j] </td>";
    echo "<td>$mail[$j] </td>";
    echo "<td>$habilitation[$j] </td>";
    echo "</tr>";
  }
}
?>
</tbody>
</table>
</div>
 <?php


if(!empty($query))
{
  for ($j=1; $j < $i ; $j++) { 
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]; 
echo "<div  class=\"container page-container\">
<div id=\"toto1\" class=\"row gutters\">
    <div class=\"toto\" >
    	<figure style =\"border-top: 3px solid $color\"  class=\"user-card \">
			<figcaption>
				<img src=\"./img/icons8-utilisateur-96.png\" alt=\"Milestone Admin\" class=\"profile\">
				<h5> $prenom[$j]  $nom[$j]</h5>
				<h6></h6>			
				<p>Enseignant chercheur.
				Laboratoire $laboratoire[$j] <br/>
			    Spécialité informatique industriel</p>
				<ul class=\"contacts\">
					<li>
						<a href=\"#\">
							$mail[$j]
						</a>
					</li>
					<li>
						<div>
							06484585443
						</div>
					</li>
				</ul>
				<div class=\"clearfix\">
					<span class=\"badge badge-pill badge-info\">Informatique design</span>
					<span class=\"badge badge-pill badge-success\">#CSS3</span>
					<span class=\"badge badge-pill badge-success\">#Angular JS</span>
				</div>
			</figcaption>
		</figure>
	</div> ";
     }
}
?>
</div>
</div>



    </tbody>
</table>
</body>
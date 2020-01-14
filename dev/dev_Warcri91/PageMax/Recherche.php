
<!DOCTYPE html>
<html>
<head>
	<title>Recherche données</title>
  <link rel="stylesheet" type="text/css" href="css/Recherche.css">
	
</head>
<body>
	<form method="POST" action="Recherche.php">
	<div class="pen-title">
  <h1>Page de Recherche</h1>
</div>
	<div class="wrap">
   <div class="search">
      <input type="text" name="toto" class="searchTerm" placeholder="Rechercher par nom">
      <button type="submit" class="searchButton">

        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
</form>

<div class="result">
<?php
if(!empty($_POST['toto']))
{
$toto = $_POST['toto'];

$i = 1;
$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 $query = "SELECT * FROM utilisateur WHERE nom LIKE '%$toto%' or laboratoire like '%$toto%' or habilitation like '%$toto%'  ;";
 //echo "$query ";
if(!empty($query))
{
$resultat = $bdd->query($query);
 
echo 'Il y a '. $resultat->rowCount() . ' entrée(s) dans la base de données : </br>';
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
 <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
    <tr  >
      <th  >id_utilisateur</th>
      <th>nom</th>
      <th>prenom</th>
      <th>laboratoire</th>
      <th>mail</th>
      <th>photo</th>
      <th>habilitation</th>
     
      <th>telephone</th>
      <th></th>
      <th></th>
    </tr>
</thead>
    </table>
  </div>

  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
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
    echo "<td>$photo[$j]</td>";
    echo "<td>$habilitation[$j] </td>";
    echo "<td>$telephone[$j] </td>";
    echo "<td><a href=\"update_bdd_pdo_form.php?id_utilisateur=$id_utilisateur[$j]&nom=$nom[$j]&prenom=$prenom[$j]&laboratoire=$laboratoire[$j]&mail=$mail[$j]&photo=$photo[$j]&habilitation=$habilitation[$j]&password=$password[$j]\"> Modifier </a></td>";
    echo "<td> <a href=\"confirm_supp.php?id_utilisateur=$id_utilisateur[$j]\"> Supprimer </a> </td>";
    echo "</tr>";
  }
}
?>
 
      </tbody>
    </table>
  </div>


 


<div class="return">
<a href="insert_bdd_pdo.html" class="button">Retour vers formulaire</a>
</div>


</body>
</html>


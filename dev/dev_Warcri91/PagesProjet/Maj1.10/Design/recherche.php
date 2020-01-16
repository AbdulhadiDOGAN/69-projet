<!DOCTYPE html>
<html>
<head>

	<title>Page de Recherche</title>
	<link href="./img/favicon.png" rel="shortcut icon"/>
    <script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>  

	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="Recherche.css">
	</meta>
</head>
<body >
<div class="contener">
	<div id="entete">
		<div class="element-entete"><img src="./img/mainpage_logo.png" style="max-width: 50px;max-height: 50px;"></div>
		<div class="element-entete"><input type="text" name="recherche" placeholder="Recherche" id="text-recherche">
		<input type="submit" name="valider" value="" id="submit-recherche">
		</div>
        <div class="element-entete"> <a  href="main.html">Accueil </a></div>
		<div class="element-entete">Ajout</div>
		<div class="element-entete">Connexion</div>
		<div class="element-entete">Contact</div>
		<div class="element-entete"><img src="./img/utilisateur.png" style="max-width: 30px;max-height: 30px;"></div>
	</div>
	<div id="corp">
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
		<div id="recherche">
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
	</div>
	<div id="pied-de-page">
		<img src="./img/mainpage_university.png" style="width: 180px">
	</div>
	
</div>

 <script language="javascript" type="text/javascript">
     var table9_Props = {  
        paging: true,  
        paging_length: 5,  
        results_per_page: ['# Ligne par Page',[5,10,20]],  
        rows_counter: true,  
        rows_counter_text: "Ligne:",  
        btn_reset: true,  
        btn_next_page_html: '<a href="javascript:;" style="margin:3px;">Suivante ></a>',  
        btn_prev_page_html: '<a href="javascript:;" style="margin:3px;">< Précédente</a>',  
        btn_last_page_html: '<a href="javascript:;" style="margin:3px;"> Dernière >|</a>',  
        btn_first_page_html: '<a href="javascript:;" style="margin:3px;"><| Premiére</a>',  
        loader: true,  
        loader_html: '<h4 style="color:red;">Loading, please wait...</h4>'  
    };  
    var tf9 = setFilterGrid( "table1",table9_Props );  
  </script>
</body>
</html>
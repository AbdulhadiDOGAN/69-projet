<!DOCTYPE html>
<html>
<head>
	<title>Ajout</title>
	<link href="./img/favicon.png" rel="shortcut icon"/>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="Ajout.css">
	<link rel="stylesheet" type="text/css" href="ajout_form.css">
	</meta>
</head>
<body>
<div class="contener">
	<?php include("entete.php"); ?>
	<div id="corp">
		<div id="contener-element">
			<form method="POST" action="nouveau_chercheur.php">
				<div class="login-page" >
					<p id="titre-form">NOUVEAU CHERCHEUR</p>
  					<div class="form">
						<input type="text" placeholder="Nom" required="required" name="nom" autofocus="">
						<input type="text" placeholder="Prenom" required="required" name="prenom">
						<input type="text" placeholder="Laboratoire" name="laboratoire">
      					<button type="=submit">Valider</button>
  					</div> <!-- form -->
<?php  				
if(isset($_GET['nom']))
{
	$nom = htmlspecialchars($_GET['nom']);
	$prenom = htmlspecialchars($_GET['prenom']);
	echo "	<div class=\"alert success\">
  				<span class=\"closebtn\">&times;</span>  
  				<strong>Félicitation!</strong> Le chercheur $nom $prenom a correctement était ajouté.
			</div>";
}
if(isset($_GET['error']))
{
echo "	<div class=\"alert error\">
  			<span class=\"closebtn\">&times;</span>  
  			<strong>Erreur !</strong> Le chercheur existe déjà dans la base de données.
		</div>";	
} 			
?>		
				</div> <!-- login-page -->
			</form>
		</div> <!-- contener-element -->
	</div> <!-- #corp -->
	<?php include("pied_de_page.php"); ?>
</div> <!-- contener -->

<script>
	var close = document.getElementsByClassName("closebtn");
	var i;
	for (i = 0; i < close.length; i++) {
  		close[i].onclick = function(){
    		var div = this.parentElement;
    		div.style.opacity = "0";
    		setTimeout(function(){ div.style.display = "none"; }, 600);
  		}
	}
</script>
</body>
</html>
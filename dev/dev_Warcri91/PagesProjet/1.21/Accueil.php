<!DOCTYPE html>
<html>
	<head>
		<title>Accueil</title>
		<link href="./img/favicon.png" rel="shortcut icon"/>
		<meta charset="utf-8"/>
	<!--	<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons"> -->
	      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	      <script type = "text/javascript" src = "Jquery/jquery-3.4.1.min.js"></script>           
		<link rel="stylesheet" type="text/css" href="Accueil.css">
		</meta>
	</head>
<body>
	<div class="contener">
		<?php include("entete.php"); ?>
		<div id="corp">
			<div id="recherche">
				<form method="post" action="carte profil.php" id="element-recherche">
					<input type="text" name="toto" autocomplete="off" placeholder="Recherche" id="text-recherche">
					<input type="submit" name="valider" value="" id="submit-recherche">
				</form>
				 <div class = "row">
	               <select multiple>
	                  <option value = "1"> Compétence</option>
	                  <option value = "2" selected=""> Chercheur</option>
	                  <option value = "3"> Laboratoire</option>
	               </select>
	            </div> <!-- row -->
			</div> <!-- recherche -->
		</div> <!-- #corp -->
	</div> <!-- contener -->
	<footer>
		<img src="./img/mainpage_university.png" style="width: 180px">
	</footer>
	<script>
	    $(document).ready(function() {
	    	$('select').formSelect();
	    });
	</script>
</body>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</html>
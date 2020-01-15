<!DOCTYPE html>
<html>
<head>
	<title>Confirmation de Suppression de profil</title>
	<style type="text/css">
		div.centre {
    position:absolute;
    left: 50%;
    top: 50%;
    width: 400px;
    height: 200px;
    margin-left: -200px; /* Cette valeur doit être la moitié négative de la valeur du width */
    margin-top: -100px; /* Cette valeur doit être la moitié négative de la valeur du height */
    border: 1px solid black;
}
	</style>
</head>
<body>

	<div class="centre">
		<h3>Voulez-vous vraiment supprimer ce chercheur ?</h3>
<?php $id_utilisateur=$_GET['id_utilisateur']; echo" <a href=\"supp_bdd_pdo.php?id_utilisateur=$id_utilisateur\">OUI</a> "; ?>
		<a href="select_bdd_pdo.php">NON</a>
	</div>

</body>
</html>

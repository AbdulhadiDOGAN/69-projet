<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
	<link rel="stylesheet" type="text/css" href="accueil.css">
</head>
<body>
<?php
$tabUrl = parse_url ( $_SERVER [ 'REQUEST_URI' ] ) ;
    $listparam = explode ( "&" , $tabUrl [ 'query' ] ) ;
    $nb_param = count ( $listparam ) ;
    for ( $i=0 ; $i<$nb_param ; $i++)
	    {
            $param = explode ( '=' , $listparam[$i] ) ;
            $paramname = $param[0];
            $paramvalue = $param[1];
            $$paramname = $paramvalue;
    }
echo"	<form method=\"POST\" action=\"update_bdd_pdo_execute.php\">
		<div class=\"login-page\" >
 			 <div class=\"form\">
		<label for=\"nom\">Id Utilisateur :</label>
		<input type=\"text\" name=\"id_utilisateur\" value=\"$id_utilisateur\" disable=\"disable\">
		<label for=\"nom\">NOM :</label>
		<input type=\"text\" name=\"nom\" value=\"$nom\" required=\"\">
		<label for=\"nom\">PRENOM :</label>
		<input type=\"text\" name=\"prenom\" value=\"$prenom\" required=\"\">
		<label for=\"nom\">LABORATOIRE :</label>
		<input type=\"text\" name=\"laboratoire\" value=\"$laboratoire\">
		<label for=\"nom\">MAIL :</label>
		<input type=\"text\" name=\"mail\" value=\"$mail\" required=\"\">
		<label for=\"nom\">CHEMIN PHOTO :</label>
		<input type=\"text\" name=\"photo\" value=\"$photo\">
		<label for=\"nom\">HABILITATION :</label>
		<input type=\"number\" name=\"habilitation\" value=\"$habilitation\" min=\"1\" max=\"3\" required=\"\">
		<label for=\"nom\">PASSWORD :</label>
		<input type=\"password\" name=\"password\" value=\"$password\" required=\"\">
		<input type=\"submit\">
		</ div>
		</div>
	</form>";
?>
</body>
</html>

<?php
$mail = htmlspecialchars($_POST['mail']);
$pass = htmlspecialchars($_POST['password']);

$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = "SELECT id_utilisateur, password FROM utilisateur WHERE mail='$mail'  ;";
        $resultat = $bdd->query($query);
        $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
        $isPasswordCorrect = password_verify($pass, $donnees['password']);
        if($isPasswordCorrect){
        	session_start();
        	$_SESSION['id']=$donnees['id_utilisateur'];
        	$_SESSION['pseudo']=$mail;
        	header("Location: Connexion.php?state=ok");
        }
        else{
        	header("Location: Connexion.php?state=erreur");
        }



?>
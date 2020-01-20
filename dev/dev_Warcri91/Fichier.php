<?php
$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 
$resultat = $bdd->query('SELECT * FROM utilisateur');
$response = [];
 
echo 'Il y a '. $resultat->rowCount() . ' entrée(s) dans la base de données : </br>';

if ($result = $mysqli->query($resultat)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $response[] = $result;
    }

    /* free result set */
    $result->free();
}
header('Content-type:application/json');
echo json_encode($response);
?>





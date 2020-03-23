 <?php
 header('Content-Type: text/html; charset=utf-8');
 if (isset($_GET['id'])) {
   $tt = $_GET['id'];
   $chercheur = $_GET ['chercheur'];
    $tab = explode(',', $tt);
   // print_r($tab);
    //echo "$chercheur";
    //echo "les compétences $tt ont été ajoutées avec succès ";
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wikicomp";
$port = "3308";
$dd = 0;

$conn = mysqli_connect($servername, $username, $password, $dbname,$port) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "SELECT relation.competence_id AS comp FROM relation, competence, chercheur WHERE relation.competence_id=competence.id_competence AND chercheur.id_chercheur=relation.chercheur_id AND chercheur.id_chercheur=$chercheur";
$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while( $row = mysqli_fetch_assoc($res) ) { 
		$Tabcomp[$dd] = $row['comp'];
		$dd++;
	}
//print_r($Tabcomp);
for ($i=0; $i < sizeof($tab) ; $i++) { 
	$bool = false;
	for ($j=0; $j < $dd ; $j++) { 
		if ($tab[$i] == $Tabcomp[$j]) {
			$bool = true;
		}
	}
	if($bool == false)
	{
		$toto = $tab[$i];
		$sql = "INSERT INTO relation (chercheur_id,competence_id) VALUES ('$chercheur', '$toto');";
		if (mysqli_query($conn, $sql)) {
    		echo "Une compétence ajoutée";
		} else {
    		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
for ($i=0; $i < $dd ; $i++) { 
	$bool = false;
	for ($j=0; $j < sizeof($tab) ; $j++) { 
		if ($tab[$j] == $Tabcomp[$i]) {
			$bool = true;
		}
	}
	if($bool == false)
	{
		$toto = $Tabcomp[$i];
		$sql = "DELETE FROM relation WHERE competence_id='$toto' AND chercheur_id=$chercheur;";
		if (mysqli_query($conn, $sql)) {
    		echo "Une compétence supprimée";
		} else {
   			//echo "Error deleting record: " . mysqli_error($conn);
		}
	}
}
mysqli_close($conn);
  ?>

  <a href="index.php"></a>
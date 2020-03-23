
<?php
//header('Content-Type: application/json');
$chercheur = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wikicomp";
$port = "3308";
$cc = 0;
$dd = 0;
$conn = mysqli_connect($servername, $username, $password, $dbname,$port) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query = "SELECT relation.competence_id AS comp FROM relation, competence, chercheur WHERE relation.competence_id=competence.id_competence AND chercheur.id_chercheur=relation.chercheur_id AND chercheur.id_chercheur=$chercheur ";
$res2 = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));
while( $row2 = mysqli_fetch_assoc($res2) ) { 
		$Tabcomp[$dd] = $row2['comp'];
		$dd++;
	}
//print_r($Tabcomp);
$sql = "SELECT id_competence AS id, nom_competence AS text, categorie AS parent_id FROM competence ";
$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_assoc($res) ) { 
		$data[] = $row;
		for ($i=0; $i < $dd ; $i++) { 
			if ($Tabcomp[$i] == $data[$cc]['id']) {
				$data[$cc]['state']['selected'] = "true";
			}
		}
		$cc++;
	}
	$itemsByReference = array();
	//$data[6]['state']['selected'] = "true";
	//$tt = $data[6]['state']['selected'];
	//echo "$tt ";
	//print_r($data);

// Build array of item references:
foreach($data as $key => &$item) {
   $itemsByReference[$item['id']] = &$item;
   // Children array:
   $itemsByReference[$item['id']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   $itemsByReference[$item['id']]['data'] = new StdClass();
}

// Set items as children of the relevant parent item.
foreach($data as $key => &$item)
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
foreach($data as $key => &$item) {
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      unset($data[$key]);
}
// Encode:
//print_r($data);
echo json_encode($data);
?>

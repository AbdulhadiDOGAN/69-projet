<?php
header('Content-Type: text/html; charset=utf-8');
	$toto = $_POST['toto'];
	$i = 0;
	$bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$query = "SELECT * FROM chercheur WHERE nom LIKE '%$toto%' or prenom like '%$toto%' or laboratoire like '%$toto%' ;";
 	//echo "$query ";
		$resultat = $bdd->query($query);
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
			$id[$i] = $donnees['id_chercheur'];
    		$nom[$i] = $donnees['nom'];
    		$prenom[$i] = $donnees['prenom'];
    		$laboratoire[$i] = $donnees['laboratoire'];  
    		$i++;
		}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Résultat</title>
	<link href="./img/favicon.png" rel="shortcut icon"/>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="resultat.css">
	<script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>
	<script src="sortabletable.js" language="javascript" type="text/javascript"></script>
	<script src="tfAdapter.sortabletable.js" language="javascript" type="text/javascript"></script> 
	</meta>
</head>
<body>
	<div class="contener">
		 <div class="toggle-wrapper">

  <input id="provide-muffins" onclick="myFunction()" name="provide_muffins" class="toggle" type="checkbox" checked />
  <label for="provide-muffins" class="toggle--label"></label>
  <div class="foux-toggle"></div>
</div>

		<?php include("entete_search.php"); ?>
		<div id="corp">
			<div id="contener-table">
			<table id="table1">
				<thead>
				<tr>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Laboratoire</th>
					<th>Profil</th>
				</tr>
				</thead>
				<tbody>
<?php

				for ($j=0; $j < $i ; $j++) { 
				echo "<tr>
						<td>$prenom[$j]</td>
						<td>$nom[$j]</td>
						<td>$laboratoire[$j]</td>
						<td><a href=\"profil.php?id=$id[$j]\">Voir profil</a></td>
					  </tr>
				";
				}
?>
			</tbody>
			</table>
			<script language="javascript" type="text/javascript">  
			var table1_Props = {
				filters_row_index: 1,
				sort: true,
				sort_config: {  
        		sort_types:['String','String','String','none']  
    			},
			    paging: true,
			    paging_length: 20,
			    results_per_page: ['# rows per page', [20, 50, 100]],
			    rows_counter: true,
			    rows_counter_text: "chercheurs : ",
			    btn_reset: true,
			    col_2: "select",
			    col_3: "none",
			    btn_next_page_html: '<a href="javascript:;" style="margin:3px;">Next ></a>',
			    btn_prev_page_html: '<a href="javascript:;" style="margin:3px;">< Previous</a>',
			    btn_last_page_html: '<a href="javascript:;" style="margin:3px;"> Last >|</a>',
			    btn_first_page_html: '<a href="javascript:;" style="margin:3px;"><| First</a>',
			    loader: true,
			    loader_html: '<h4 style="color:red;">Loading, please wait...</h4>'
			};
			var tf = new setFilterGrid("table1", table1_Props);
			tf.init();
			</script> 
		</div>
		</div>
		<?php include("pied_de_page.php"); ?>
	</div>
</body>
</html> 
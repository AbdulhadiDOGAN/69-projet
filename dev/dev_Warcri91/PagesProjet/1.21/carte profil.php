    <?php
header('Content-Type: text/html; charset=utf-8');
    $toto = htmlspecialchars($_POST['toto']);
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
 <body style="height:100%; width:100%">
    <div id="header" style="position:absolute; top:0px; left:0px; height:200px; right:0px;overflow:hidden;"> 
    <?php include("entete_search.php"); ?>
</div>
     <div class="toggle-wrapper">

  <input id="provide-muffins" onclick="myFunction()" name="provide_muffins" class="toggle" type="checkbox" checked />
  <label for="provide-muffins" class="toggle--label"></label>
  <div class="foux-toggle"></div>
</div>





<div id="content" style="position:absolute; top:150px; bottom:50px; left:0px; right:0px; overflow:auto;"> 

<div id="recherche" style="display: none" >
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
                        <td><a href=\"Profil1.php?id=$id[$j]\">Voir profil</a></td>
                      </tr>
                ";
                }
?>
            </tbody>
            </table>
        
</div>


<div id="test" style="display: block;">
 <?php
if(!empty($query))
{
  for ($j=0; $j < $i ; $j++) { 
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]; 
echo "<div  class=\"container page-container\">
<div id=\"toto1\" class=\"row gutters\">
    <div class=\"toto\" >
    <a id=\"lien\" href=\"Profil1.php?id=$id[$j]\">
    	<figure style =\"border-top: 3px solid $color\"  class=\"user-card \">
			<figcaption>
            
				<img src=\"./img/icons8-utilisateur-96.png\" alt=\"Milestone Admin\" class=\"profile\">
                
				<h5> $prenom[$j]  $nom[$j]</h5>
				<h6></h6>			
				<p>Enseignant chercheur.
				Laboratoire $laboratoire[$j] <br/>
			    Spécialité informatique industriel</p>
				<ul class=\"contacts\">
					<li>
						<a href=\"#\">
							
						</a>
					</li>
					<li>
						<div>
							06484585443
						</div>
					</li>
				</ul>
				<div class=\"clearfix\">
                ";
                

				/*	<span class=\"badge badge-pill badge-info\">Informatique design</span>
					<span class=\"badge badge-pill badge-success\">#CSS3</span>
					<span class=\"badge badge-pill badge-success\">#Angular JS</span>*/
				echo"</div>
			</figcaption>
		</figure>
        </a>
        </div>
        </div>
	</div> ";
     }
}
?>
</div>
</div>




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


            function myFunction() {
  var x = document.getElementById("test");
  var x1 = document.getElementById("recherche");

  if (x.style.display === "none") {
    x.style.display = "block";
    x1.style.display = "none";
    
  } else {
    x.style.display = "none";
    x1.style.display = "block";
   
  }

  
}
</script>   
    
</body>     
</html>
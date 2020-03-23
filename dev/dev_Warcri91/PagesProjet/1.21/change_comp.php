<?php
//include("response.php");
$id = $_POST['id'];
//echo "$id";
?>  

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./img/favicon.png" rel="shortcut icon"/>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>

<link rel="stylesheet" href="dist/style.min.css" />
<link rel="stylesheet" type="text/css" href="arbo.css">
<script src="dist/jstree.min.js"></script>

<title></title>
<script>
</script>
</head>
<body>
<a href="Accueil.php">Retour Accueil</a>


<input type="text" value="" id="search">
<div id="tree-container"></div>
<div id="event_result"></div>
<div id="event_result0"></div>
<input type="button" value="Valider" onclick="requestInfo(this)" />
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){ 
    var fichier = "response.php?id=" + <?php echo json_encode($id); ?>;
    //fill data to tree  with AJAX call
    $('#tree-container').on('changed.jstree', function (e, data) {
      var i, j, r = [];
      for(i = 0, j = data.selected.length; i < j; i++) {
        r.push(data.instance.get_node(data.selected[i]).text);
      }
      $('#event_result').html(r.join(','));}).jstree({
	'plugins': ["wholerow", "checkbox","search","sort","types"],
        'core' : {
            'data' : {
                "url" : fichier,
                "dataType" : "json" // needed only if you do not supply JSON headers
            }
        }
    });
    var to = false;
    $('#search').keyup(function () {
    if(to) { clearTimeout(to); }
    to = setTimeout(function () {
      var v = $('#search').val();
      $('#tree-container').jstree(true).search(v);
    }, 250);
    }); 

});

function requestInfo(button) {
  var idMateriel = button.value;
  var monTexte = $("#tree-container").jstree("get_checked");
  var op = <?php echo json_encode($id); ?>;
  var ajax = new XMLHttpRequest();
  ajax.open("GET", "arbo_modif.php?id=" + monTexte + "&chercheur=" + op);
  ajax.onload = function() {
    document.getElementById("event_result0").innerHTML = this.responseText;
  };
  ajax.send();
}
</script>
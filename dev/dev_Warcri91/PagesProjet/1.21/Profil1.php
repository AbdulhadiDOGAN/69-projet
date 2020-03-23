
<?php
header('Content-Type: text/html; charset=utf-8');
    $id = $_GET['id'];
    $i = 0;
    $bdd = new PDO('mysql:host=localhost;dbname=wikicomp;port=3308;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = "SELECT * FROM chercheur WHERE id_chercheur=$id ;";
    //echo "$query ";
        $resultat = $bdd->query($query);
        while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $id = $donnees['id_chercheur'];
            $nom = $donnees['nom'];
            $prenom = $donnees['prenom'];
            $laboratoire = $donnees['laboratoire']; 
            //echo "$id $nom $prenom $laboratoire"; 
        }
    $statement = "SELECT competence.nom_competence AS comp FROM relation, competence, chercheur WHERE relation.competence_id=competence.id_competence AND chercheur.id_chercheur=relation.chercheur_id AND chercheur.id_chercheur=$id";
    $resultat = $bdd->query($statement);
    while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $Tabcomp[$i] = $row['comp'];
        $i++;
    }

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="profil1.css">
<!------ Include the above in your HEAD tag ---------->

<?php include("entete.php"); ?>
<div id="corp">

<div class="container emp-profile">
           
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="./img/icons8-utilisateur-96.png" alt="Milestone Admin" class="profile">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                       <?php echo "$prenom $nom"; ?>
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Compétences</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <form method="POST" action="change_comp.php">
                    <?php 
                    echo "<input type=\"text\" name=\"id\" value=\"$id\" hidden=\"\">";
                    ?>
                        <input type="submit"  class="profile-edit-btn" name="btnAddMore" value="Modifier Compétences"/>
                           </form>
                    </div>
               
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">SiteWeb</a><br/>
                            <a href="">Document</a><br/>
                            <a href="">Dossiers</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Utilisateurs</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo "$prenom "; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo "$prenom $nom"; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Laboratoire</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo "($laboratoire)"; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php  
                    for ($j=0; $j < $i; $j++) { 
                        $red = (rand(0,50)/100)*255;
                        $green = (rand(0,50)/100)*255;
                        $blue = (rand(0,50)/100)*255;
                        echo "<div class=\"competence-element\" style=\"background-color:rgb($red, $green, $blue,0.5)\">$Tabcomp[$j]</div>";
                    }
                    if($i == 0){
                        $red = (rand(0,50)/100)*255;
                        $green = (rand(0,50)/100)*255;
                        $blue = (rand(0,50)/100)*255;
                        echo "<div class=\"competence-element\" style=\"background-color:rgb($red, $green, $blue,0.5)\">Aucune compétences trouvées</div>";
                    }
                ?></p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

    </div>
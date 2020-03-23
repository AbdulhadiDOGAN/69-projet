
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link href="./img/favicon.png" rel="shortcut icon"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="Connexion.css">

    <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
          <link rel = "stylesheet"
             href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
          <script type = "text/javascript"
             src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
          <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script>
    </meta>
</head>
 <body style="height:100%; width:100%">
    <div id="header" style="position:absolute; top:0px; left:0px; height:200px; right:0px;overflow:hidden;"> 
    <?php include("entete.php"); ?>

</div>



<div id="content" style="position:absolute; top:100px;  left:0px; right:0px; overflow:auto;"> 
    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Se connecter</a></li>
        <li class="tab"><a href="#signup">S'inscrire</a></li>
      </ul>
      
      <div class="tab-content">

<div id="login">   
          <h1>Bonjour !</h1>
          
          <form action="verif_con.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email <span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="mail" autofocus="" />
          </div>
          
          <div class="field-wrap">
            <label>
              Mot de passe<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Se connecter</button>
          </form>
          <?php
          if(isset($_GET['state']))
            {
              $state = htmlspecialchars($_GET['state']);
              if($state == "erreur"){
              echo "  <div class=\"alert error\">
                        <span class=\"closebtn\">&times;</span>  
                       <strong>Erreur !</strong> Le mail/mot de passe n'est pas correct.
                      </div>";  
            }
            elseif ($state == "ok") {
              echo "  <div class=\"alert success\">
                        <span class=\"closebtn\">&times;</span>  
                       Vous êtes maintenant connecté(e).
                      </div>";
            }
          }
          ?>
        </div>


        <div id="signup">   
          <h1>INSCRIPTION</h1>
          
          <form action="Utilisateur.php" method="post" onsubmit="return test()">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nom<span class="req">*</span>
              </label>
              <input type="text" name="nom"  required autocomplete="off"/>
            </div>
        
            <div class="field-wrap">
              <label>
                Prénom<span class="req">*</span>
              </label>
              <input type="text" name="prenom" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              EMail<span class="req">*</span>
            </label>
            <input type="email" name="mail" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Mot de passe<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off" id="password" />
          </div>
          <div class="field-wrap">
            <label>
              Retapez le mot de passe<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off" id="repassword" />
          </div>
          <div id="errormdp"></div>
          <button type="submit" class="button button-block"/>S'inscrire</button>
          <?php
                        if(isset($_GET['error'])){
                            $error = $_GET['error'];
                                if($error == "doublon"){
                                echo "<div id=\"error\"> Ce compte existe déjà dans la base de données </div>";
                            }
                        }
                        ?>
          </form>

        </div>
        
        
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
 
    <div id="footer" style="position:absolute; bottom:0px; height:0px; left:0px; right:0px; overflow:hidden;"> 
        <img src="./img/mainpage_university.png" style="width: 180px">
    </div>


    <script type="text/javascript">
        $(".form")
  .find("input, textarea")
  .on("keyup blur focus", function(e) {
    var $this = $(this),
      label = $this.prev("label");

    if (e.type === "keyup") {
      if ($this.val() === "") {
        label.removeClass("active highlight");
      } else {
        label.addClass("active highlight");
      }
    } else if (e.type === "blur") {
      if ($this.val() === "") {
        label.removeClass("active highlight");
      } else {
        label.removeClass("highlight");
      }
    } else if (e.type === "focus") {
      if ($this.val() === "") {
        label.removeClass("highlight");
      } else if ($this.val() !== "") {
        label.addClass("highlight");
      }
    }
  });

$(".tab a").on("click", function(e) {
  e.preventDefault();

  $(this)
    .parent()
    .addClass("active");
  $(this)
    .parent()
    .siblings()
    .removeClass("active");

  target = $(this).attr("href");

  $(".tab-content > div")
    .not(target)
    .hide();

  $(target).fadeIn(600);
});

    </script>

    <script>
  var close = document.getElementsByClassName("closebtn");
  var i;
  for (i = 0; i < close.length; i++) {
      close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
      }
  }
</script>
<script type="text/javascript">
  function test() {
    var pass = document.getElementById('password').value;
    var repass = document.getElementById('repassword').value;
  if(pass==repass)
  {
    if(pass.length > 7){
      return true;
    }
    else{
      document.getElementById('errormdp').innerHTML = 'Votre mot de passe doit être de 8 caractères minimum';
      return false;
    }
  }
  else{
    document.getElementById('errormdp').innerHTML = 'Le mot de passe n\'est pas identique';
    return false;
  }
}
</script>
</body>     
</html>
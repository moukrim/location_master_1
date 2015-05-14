//cedric teramo
/*#######################################################*/
/* Page d'accueil de l'administrateur */
/*#######################################################*/
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="../bootstrap/css/styles.css" rel="stylesheet">
	  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	  <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  </head>

  <body background="../image/bg.jpg">
   <header class="row col-sm-12" >
      <div class="navbar navbar-default navbar-fixed-top" style="background-color:#000;">
        <div class="navbar-header">
         <a class="navbar-brand" style="color: mintcream">Location voiture</a>
        </div> 
         <div class="navbar-form navbar-right" role="search">
          <div class="form-group" style="color: mintcream">
            <strong>
              <?php
                session_start();
                echo  $_SESSION["login"];
              ?>
            </strong>
          </div>
            <button type="submit" class="btn btn-default" id="boutonDeconnexion" onclick="window.location.href='deconnexion.php'" >Deconnexion</button>
        </div>
      </div>
    </header>
	 <div class="row col-sm-12" >
	  <div class="row">
      <div class="col-sm-3 col-md-4 col-md-offset-3">
        <a href="ajoutVehiculeClient.php">
          <img class="img-responsive" src="../image/ajout.png" >
        </a>
        <h3>Ajout</h3>
      </div>
     		<div class="row">
          <div class="col-md-4  portfolio-item">
            <a href="suppression.php">
              <img class="img-responsive" src="../image/suppression.png">
            </a>
            <h3>Suppression</h3>
     	    </div>
     	  </div>
    </div>	
	  <div class="row">
      <div class="col-sm-3 col-md-4 col-md-offset-3">
          <a href="modification.php">
            <img class="img-responsive" src="../image/modif.png" >
          </a>
          <h3>Modification</h3>
      </div>
        <div class="row">
          <div class="col-md-4  portfolio-item">
            <a href="tableauBord.php">
              <img class="img-responsive" src="../image/stat.png">
            </a>
             <h3>Tableau de bord</h3>        
     	    </div>
     	  </div>
      </div>	
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>

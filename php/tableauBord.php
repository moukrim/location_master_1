<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="../bootstrap/css/styles.css" rel="stylesheet">
	  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src='../bootstrap/js/Chart.min.js'></script>
    <script src="../bootstrap/js/graph.js"></script>
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
</div>
<div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
 <strong>Les véhicules les plus rentables: </strong>
</div>
<br>
<br>
<br>
<br>
<div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
<canvas id="myChart" width="600" height="400"></canvas>

</div>



   <div class="col-sm-offset-8 col-sm-2 col-sm-offset-8">
    <button type="button" class="glyphicon glyphicon-arrow-left" id="RetourMenu" onclick="window.location.href='indexConnecte.php'" > Menu</button>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>

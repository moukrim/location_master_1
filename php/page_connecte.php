<?php
//yassine

/*#######################################################*/
/* Page d'accueil connecté */
/*#######################################################*/

require '_header.php';
//var_dump($_SESSION);

?>

<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/styles.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery.js"></script>
  </head>

  <body background="../image/bg.jpg">
   
      <header class="row col-sm-12" >
        <div class="navbar navbar-default navbar-fixed-top" style="background-color:#000101 ;">
				  <div class="navbar-header">
         
					 <a class="navbar-brand" href="#" style="color:mintcream;">Location voiture</a>
				
				 </div> 
				 <?php require 'affiche-nom-utilisateur.php';?>
            </div>
      </header>
	  
      <div class="row col-sm-12" >
	  
        <div class="col-sm-2"> 

			<div class="row ">
			<nav class="col-sm-12">
          <ul class="nav nav-pills nav-stacked">
            <li> <a href="#"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
			<?php require 'bouton-deconnexion.php'; ?>
            <li> <a href="recherche-v.php"> <span class="glyphicon glyphicon-search"></span> Recherche voiture </a> </li>
            <li role="presentation"><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Votre comparateur <span class="badge"><?php echo ($_SESSION["comp"]); ?></span></a></li>          
          
          </ul>
		  </nav>
		  </div>
		
		<div class="row">
			<div  class="col-sm-12" style="height:3px;">
			</div>
		</div>	
		
		<div class="row">
		<aside id="aside_id" class="col-sm-12">

			<address>
				<strong>Location voiture</strong><br>
				Bastia,<br>
				moukrim_yassine@hotmail.fr,<br>
				Tel: 04 04 04 04 04
			</address>
			
		</aside>
		
	</div>
	</div>	
        <div class="col-sm-8"> 
			<div class="row">
				<div class="col-sm-12">
				<div id="myCarousel" class="carousel slide" style="width: 873px;"  data-ride="carousel">

				<ol class="carousel-indicators">
					<li data-target = "#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target = "#myCarousel" data-slide-to="1"></li>
					<li data-target = "#myCarousel" data-slide-to="2"></li>
				</ol>
    
			  <div class="carousel-inner" style="margin-left: -2px;">
    
				<div class="item active">
					<img src="../image/v1.jpg"  class="adaptar">
				</div>
        
				<div class="item">
					<img src="../image/v2.jpg"  class="adaptar">
				</div>
				
				<div class="item">
					<img src="../image/v3.jpg"  class="adaptar">
				</div>
        
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">
					<span class="icon-next"></span>
				</a>
			  </div>

			</div>
			</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12" style="height:30px; ">
										
				
				</div>
			</div>	
			
			<div id="cadre" class="row">
				<div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
					<table class="table">
					   <caption style="text-align:center;">Les véhicules plus loués</caption>
					   <thead>
					      <tr>
					         <th>Vehicule</th>
					         <th>Type</th>
					         <th>Modele</th>
					         <th>Prix/Jr</th>
					      </tr>
					   </thead>
					   <tbody>
					   <?php
							require 'recup-nbLoc.php';
					    ?>
					   </tbody>
					</table>
				</div>
			</div>	
			
			
			
			</div>
			
			<aside class="col-sm-2">

			<div class="panel panel-default" style="width: 220px;  margin-left : 5px;"  >
				<div class="panel-heading">
					<h3 class="panel-title">Bienvenue sur notre site</h3>
				</div>
				<div class="panel-body">
				<p>Bien que tréss résistants et capables d'endurer de nombreux chocs, les pneus peuvent parfois crever. En cas de crevaison, votre pneu doit faire l'objet d'un examen par un professionnel. Lui seul peut s'assurer que son enveloppe intérieure n'a pas subi de dommages qui rendent le pneu irréparable.Six raisons exigent de changer un pneu. Si, dans certains cas, le pneu est réparable, il doit avant toute réparation faire l'objet d'un examen minutieux réalisé par un professionnel. Lui seul, peut confirmer que le pneu n'a pas subit de dommages internes.</p>
				</div>
			</div>
			
		</aside>
        
      </div>
	  
	  
	  
	  
      <footer class="row col-sm-12">
		<div class="col-sm-offset-5 col-sm-2 col-sm-offset-5">
        <div class="panel panel-body">
          <p>Copyright © 2015 M.Y</p>
        </div>
		</div>
      </footer>
   
   
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
  </body>

</html>
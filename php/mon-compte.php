<?php
//yassine

/*#######################################################*/
/* page de gestion du compte utilisateur*/
/*#######################################################*/

require '_header.php';
//var_dump($_POST);

?>

<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8"> 
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" charset="utf-8">  
	<link href="../bootstrap/css/styles.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery.js"></script>



  </head>

  <body background="../image/bg.jpg">
   
      <header class="row col-sm-12" >
        <div class="navbar navbar-default navbar-fixed-top" style="background-color:#000101 ;">
				  <div class="navbar-header">
         
					 <a class="navbar-brand" href="index.php" style="color:mintcream;">Location voiture</a>
				
				 </div> 
				 <?php require 'affiche-nom-utilisateur.php'; ?>
				 
            </div>
      </header>
	  
      <div class="row col-sm-12" >
	  
        <div class="col-sm-2"> 

			<div class="row ">
			<nav class="col-sm-12">
          <ul class="nav nav-pills nav-stacked">
            <li> <a href="index.php"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
			<?php require 'bouton-deconnexion.php'; ?>
			<?php require 'verif-possibilite-seconn.php'; ?>
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
				<div class="panel panel-warning" style="width:1100px;">
				    <div class="panel-heading" style="height: 51px;">
				        <ul class="nav nav-tabs">
						  <li role="presentation"  class="active"><a data-toggle="tab" href="#hist"><span class="glyphicon glyphicon-time"></span>Votre historique</a></li>
						  <li role="presentation" ><a data-toggle="tab" href="#profile1"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
						</ul>
				    </div>
				 
				    	<div class="tab-content" >
			  			   <div class="tab-pane active" id="hist">
				    		<table class="table table-hover">
							    <thead>
							        <tr>
							        <?php if(isset($_SESSION['id'])){ 
							            echo('<input type="hidden" id="session" value="'.$_SESSION['id'].'">');
							        }
							            ?>
							            <th></th>
							            <th>Type</th>
							            <th>Modele</th>
							            <th>Informations de réservation</th>
							            <th>Annuler une réservation</th>

							        </tr>
							    </thead>
							    <tbody id="affiche-historique">

							        

							    </tbody>

							</table>
						  </div>
						  <div class="tab-pane" id="profile1">
						   <table class="table table-hover">
							    <thead>
							        <tr>
							            <th>Nom</th>
							            <th>Prénom</th>
							            <th>Adresse Mail</th>
							            <th>Mot de Passe</th>

							        </tr>
							    </thead>
							    <tbody id="affiche-profile">

							        

							    </tbody>

							</table>
						   	</div>
			   			</div>	

						   
						  
				    
			   </div>
			  

			</div>
			</div>
			
				
			
			<div class="row">
				<div class="col-sm-12">
				
			</div>
			</div>
			
			
			<div class="row">
				<div class="col-sm-12" style="height:140px; ">
										
				
				</div>
			</div>


			</div>
			 <div class="col-sm-2"> 
				<div class="row">
					
				</div>
		 	</div>



        
      </div>
	  
	  
	  
	  
 <div class="modal fade bs-example-modal-sm" id="conf-annul" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="text-align:center; font-size:20px;">
    	L'annulation a été bien enregistrer..<img src="../img/annuler.jpg" style="height:200px;">
     </div>
  </div>
</div>

   
 <div class="modal fade bs-example-modal-sm" style="margin-left:-600px;" id="modal-date" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="text-align:center; font-size:20px;  width:900px;">
    	<table class="table table-hover">
							    <thead>
							        <tr>
							            <th style="color:green;">Date début</th>
							            <th style="color:green;">Date fin</th>
							            <th style="color:green;">Prix Payé(€)</th>
							            <th style="color:green;">Date de réservation</th>
							       		<th style="color:green;">Numéro de réservation</th>

							        </tr>
							    </thead>
							    <tbody id="affiche-date">

							        

							    </tbody>

							</table>
     </div>
  </div>
</div>

    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/mon-compte.js"></script>
  </body>

</html>
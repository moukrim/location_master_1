<?php
//yassine
require '_header.php';
//var_dump($_POST);

?>

<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/styles.css" rel="stylesheet">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="../bootstrap/scripts/jquery-1.11.1.min.js"></script>
	 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


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
				<div class="panel panel-warning" style="width:874px;">
				    <div class="panel-heading">
				        <h3 class="panel-title">Reservation</h3>
				    </div>
				    <div class="panel-body" style="height:125px;">
				    	
				    		<table class="table table-hover">
							    <thead>
							        <tr>
							            <th>Nom de produit</th>
							            <th>Modele</th>
							            <th>Prix/Jr>=150KMs</th>
							            <th>Prix/Jr<=150KMs</th>
							        </tr>
							    </thead>
							    <tbody>
							        <tr>
							            <td><?= $_POST["marque"]?></td>
							            <td><?=$_POST["modele"]?></td>
							            <td><?=number_format($_POST['prixJour'],2,',',' ').'€'?></td>
							            <td><?=number_format($_POST['prix'] *150, 2, ',', ' ').'€'?></td>
							            
							           
							            <?php if(isset($_SESSION['id'])){ 
							            echo('<input type="hidden" id="session" value="'.$_SESSION['id'].'">');
							            echo('<input type="hidden" id="prixj" value="'.$_POST['prixJour'].'">');
							            echo('<input type="hidden" id="prixk" value="'.number_format($_POST['prix'] *150, 2, ',', ' ').'">');
							        }
							            ?>
							            <input type="hidden" id="id" value=<?='"'.$_POST["id"].'"'  ?>>
							        </tr>
							        
							    </tbody>

							</table>
							 <input type="button" id="btn-reservation" class="btn btn-success" value="Réserver">
				    </div>
			   </div>

			</div>
			</div>
			
				
			
			<div class="row">
				<div class="col-sm-12">
				<div id="cache-validation">
				<div class="panel panel-warning" style="width:874px;">
				    <div class="panel-heading">
				        <h3 class="panel-title">Validation</h3>
				    </div>
				    <div class="panel-body">
				    	
				    		<table class="table table-hover">
				    		<div id="rad" style="position:absolute; margin-top:-18px;">
							  <div class="radio">
						     	 <label><input type="radio" id="optradiojour" name="optradio" checked>> 150 KMs/Jr</label>
						    </div>
						    <div class="radio"> 
						     	 <label><input type="radio" id="optradiokm" name="optradio">< 150 KMs/Jr</label>
						    </div>
						    </div>
							    <tbody>
							    <div id="erreur"></div>
							       <div class="row">
										<div class="col-sm-12 " style="margin-left:120px;" >
						        			<label for="from">Du</label>
											<input type="text" id="from" name="from" placeholder="Date début">
											<label for="to">Au</label>
											<input type="text" id="to" name="to" placeholder="Date fin">

										</div>
									</div>
									<div id="ww">
									<div id="prixfinale" style="position:absolute; margin-top:-35px; margin-left:550px;">
									</div>
									 <input type="button" id="btn-reserv"  class="btn btn-success" value="Valider la réservation">
							       </div>
							    </tbody>
							</table>

				    </div>
			   </div>
			</div>
			</div>
			</div>
			
			
			<div class="row">
				<div class="col-sm-12" style="height:140px; ">
										
				
				</div>
			</div>


			</div>
			 <div class="col-sm-2"> 
				<div class="row">
						<div class="col-sm-12"> 
							<img src="<?= $_POST["img"]?>" style="height:163px; width:230px;">
						</div>
				</div>
		 	</div>



        
      </div>
	  
	  
	  
	  

  
   <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      Connectez-vous pour réserver si vous êtes dèja inscris...
      Sinon, c'est facile soit pour vous inscrire ou vous connecter en <a href="log-sign.php" style="color:blue;">cliquant-ici</a>...
    </div>
  </div>
</div>

   
 <div class="modal fade bs-example-modal-sm" id="modal-reserv" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="text-align:center; font-size:20px;">
    	La réservation a été bien enregistrer..<img src="../img/ok.jpg" style="height:200px; margin-left:40px;">
     </div>
  </div>
</div>

    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/verif-valid-reserv.js"></script>
  </body>

</html>
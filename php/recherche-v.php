<?php
require '_header.php';
//var_dump($_POST);
?>

<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/styles.css" rel="stylesheet">
	 <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" charset="utf-8">
	 <link rel="stylesheet" href="../bootstrap/jqwidgets/styles/jqx.base.css" type="text/css"/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="../bootstrap/js/jquery.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
  <script type="text/javascript" src="../bootstrap/scripts/demos.js"></script>
  <script type="text/javascript" src="../bootstrap/jqwidgets/jqxcore.js"></script>
  <script type="text/javascript" src="../bootstrap/jqwidgets/jqxdatetimeinput.js"></script>
  <script type="text/javascript" src="../bootstrap/jqwidgets/jqxcalendar.js"></script>
  <script type="text/javascript" src="../bootstrap/jqwidgets/jqxtooltip.js"></script>
  <script type="text/javascript" src="../bootstrap/jqwidgets/globalization/globalize.js"></script>
  

  </head>




  <body background="../image/bg.jpg">
  		<?php
 			require 'recup-type-marque.php';
		?>
   
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
		
	        <div class="col-sm-2" > 
	           
	        	<div class="well" style="height:320px; width:211px;" >
		        	<div class="panel panel-default" style="width:190px; height:60px; text-align:center;">
						  <div class="panel-body">
						    <p> Choisissez votre type de recherche: </p>
						  </div>
					</div>
	        		
	        		<button type="button" id="parvehicule" class="btn btn-info">Par Véhicule</button>
	        		<button type="button" id="pardate" class="btn btn-primary">Par Date</button>
	        		<div id="cache-filtre-date">
	        			<div id="erreurdate"></div>
	        			<div class="row">
							<div class="col-sm-12 " >
		        			<label for="from">Du</label>
							<input type="text" id="from" name="from" placeholder="Date début">
							<label for="to">Au</label>
							<input type="text" id="to" name="to" placeholder="Date fin">

						</div>
						</div>
						<div class="row">
							<div class="col-sm-offset-3 col-sm-9 " >

							<button type="button" id="button-date" class="btn btn-default"> Chercher</button>
							</div>
						</div>

					</div>	
	        		<div id="cache-filtre-veh">
	        			<div id="erreur"></div>
			        	<form >
						<div class="row">
							<div class=" col-sm-12 " >
								<select name="type" id="typeSelect"   class="form-control">
									<option  value="0">
										Selectionner le type
									</option>
								<?php
						       
								while( $result = mysql_fetch_assoc( $requete ) )
								{
									echo( '<option >'.$result["type"].'</option>');
								}
								
								?>
								</select>

						</div>
						</div>
						
						<div class="row">
							<div class="col-sm-offset-4 col-sm-4 col-sm-offset-4" style="height:30px; ">
													
							
							</div>
						</div>	


						
						<div class="row">
						<div class=" col-sm-12" >	
						<div id="marqueSelect" style="margin-bottom:10px;">
						<div class="row">
							<div class="col-sm-12">
													
							 <?php
						        echo( '<select name="marque" id="4X4" class="form-control">\n' );
								while( $result = mysql_fetch_assoc( $re ) )
								{
									echo( '<option>'.$result["marque"].'</option>');
								}
								echo( "</select>");	
								?>
							</div>
						</div>
							
						<div class="row">
							<div class="col-sm-12">
													
							 <?php
						        echo( '<select name="marque" id="Berline" class="form-control">\n' );
								while( $resultat = mysql_fetch_assoc( $r ) )
								{
									echo( '<option>'.$resultat["marque"].'</option>');
								}
								echo( "</select>");	
								?>
							</div>
						</div>



						<div class="row">
							<div class="col-sm-12">
													
							 <?php
						        echo( '<select name="marque" id="Citadine" class="form-control">\n' );
								while( $res = mysql_fetch_assoc( $rr ) )
								{
									echo( '<option>'.$res["marque"].'</option>');
								}
								echo( "</select>");	
								?>
							</div>
						</div>

						</div>
						</div>


						</div>
						<div class="row">
							<div class="col-sm-offset-3 col-sm-9" >

							<button type="button" id="submit-option" class="btn btn-default">Chercher</button>
							</div>
						</div>



						</form>
				</div>
			  </div>
			  
			  	<div id="calendrier"></div>
			  		
			</div>

			
			<div class="col-sm-8" > 

				        <div class="row">

             <div class="home">
                    <div class="row">

                
               		<div id="liste">
               			

               		</div>


               		

                                
                    </div>
                  
                  </div>
                
        
        </div>
			</div>
        	



      </div>
	  
	  
	  <div class="row col-sm-12" style="height:150px;">
	  	

	  </div>
	  
  
   

   
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        Le véhicule a bien été ajouter au comparateur...
        Le comparateur permet de comparer plusieurs voitures selectionnées et de choisir le nombre de KMs voulus parcourir.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="panier.php"><button type="button" class="btn btn-primary">Voir comparateur</button></a>
      </div>
    </div>
  </div>
</div>
    <script src="../bootstrap/js/bootstrap.js"></script>
     <script src="../bootstrap/js/affiche-option.js"></script>
    <script src="../bootstrap/js/choix-filtre.js"></script>
 	<script src="../bootstrap/js/filtre-date.js"></script>
    <script src="../bootstrap/js/uical.js"></script>
     <script src="../bootstrap/js/affiche-v.js"></script>
    
    
    
    

  </body>

</html>
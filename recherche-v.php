<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/styles.css" rel="stylesheet">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  </head>


  <body background="image/bg.jpg">
  		<?php
 
  					//connexion au serveur
 					 $cnx = @mysql_connect('localhost', 'root', '') ;
  					//sélection de la base de données
  					$db  = mysql_select_db('location') ;
 
 					 //création de la requête SQL
 					 $sql = "SELECT type FROM vehicule GROUP BY type	";
 					 //exécution de la requête SQL
  					$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;


  					 //création de la requête SQL
 					 $sq = "SELECT marque FROM vehicule WHERE type='4X4' GROUP BY marque	";
 					 //exécution de la requête SQL
  					$re = @mysql_query($sq, $cnx) or die($sq."<br>".mysql_error()) ;

  					 //création de la requête SQL
 					 $s = "SELECT marque FROM vehicule WHERE type='Berline' GROUP BY marque ";
 					 //exécution de la requête SQL
  					$r = @mysql_query($s, $cnx) or die($s."<br>".mysql_error()) ;

  					 //création de la requête SQL
 					 $ss = "SELECT marque FROM vehicule WHERE type='Citadine' GROUP BY marque	";
 					 //exécution de la requête SQL
  					$rr = @mysql_query($ss, $cnx) or die($ss."<br>".mysql_error()) ;





				?>
   
      <header class="row col-sm-12" >
        <div class="navbar navbar-default navbar-fixed-top" style="background-color:#BBE1D7 ;">
				 
                  <div class="navbar-header">
         
					 <a class="navbar-brand" href="#">Location voiture</a>
				
				 </div> 
				 <div id="form-inline">
				 <form class="form-inline">
  						<div class="form-group">
    						<label for="exampleInputName2">Name</label>
   							 <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
  						</div>
 						 <div class="form-group">
   							 <label for="exampleInputEmail2">Email</label>
    						 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
  						</div>
 						 <button type="submit" class="btn btn-default">Envoyer</button>
				</form>
				</div>
            </div>
      </header>
	  
      <div class="row col-sm-12" >
	  
        <div class="col-sm-2"> 

			<div class="row ">
			<nav class="col-sm-12">
          <ul class="nav nav-pills nav-stacked">
            <li> <a href="index.php"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
			<li> <a href="log-sign.html"> <span class="glyphicon glyphicon-pencil"></span> LOGIN/SIGN-UP </a> </li>
            <li> <a href="reherch-v.php"> <span class="glyphicon glyphicon-search"></span> Recherche voiture </a> </li>
          
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
	</div><!--<div class="col-sm-4" >
		<div class="well">
			<form id="eventForm" method="post" class="form-horizontal">

			    <div class="form-group">
			        <label class="col-xs-5 control-label">Date début:</label>
			        <div class="col-xs-5 date">
			           <input type="date" id="dtdebut" name="dtdebut" style="height:30px;" >
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="col-xs-5 control-label">Date fin:</label>
			        <div class="col-xs-5 date">
			           <input type="date" id="dtfin" name="dtfin" style="height:30px;" >
			        </div>
			    </div>

			    <div class="form-group">
			        <div class="col-xs-3 col-xs-offset-5">
			            <button type="submit" id="submit-recherche" class="btn btn-default">Validate</button>
			        </div>
			    </div>
			</form>
			</div>
		  </div>-->
		
	        <div class="col-sm-8" > 
	           <div id="cache-filtre">
	        	<div class="well" style="height:300px;">
			        	<form method="post" action="liste-voiture.php">
						<div class="row">
							<div class="col-sm-offset-4 col-sm-4 col-sm-offset-4" >
								<select name="type" id="speed1" class="form-control">
									<option value="0">
										Selectionner le type
									</option>
								<?php
						       
								while( $result = mysql_fetch_assoc( $requete ) )
								{
									echo( '<option>'.$result["type"].'</option>');
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
						<div class="col-sm-offset-4 col-sm-4 col-sm-offset-4" >	
						<div id="step1">
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
							<div class="col-sm-offset-5 col-sm-2 col-sm-offset-5" >

							<button type="submit" class="btn btn-default">Envoyer!</button>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12" style="height:400px; ">
													
							
							</div>
						</div>	


						</form>
				</div>
			  </div>		
			</div>

        
      </div>
	  
	  
	  <div class="row col-sm-12" style="height:150px;">
	  	

	  </div>
	  
      <footer class="row col-sm-12">
		<div class="col-sm-offset-5 col-sm-2 col-sm-offset-5">
        <div class="panel panel-body">
          <p>Copyright © 2015 M.Y</p>
        </div>
		</div>
      </footer>
   
   
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/affiche-option.js"></script>
    <script src="bootstrap/js/filtre-date.js"></script>
  </body>

</html>
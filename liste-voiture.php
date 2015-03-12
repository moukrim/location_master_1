<?php

require '_header.php';
?>
<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  </head>

  <body background="image/bg.jpg">
   

<?php 

if(isset($_POST['type']) && isset($_POST['marque']) ){

$type=$_POST['type'];
$marque=$_POST['marque'];

 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;
 
 //création de la requête SQL
 $sql = "SELECT * FROM vehicule WHERE type='$type' AND marque='$marque'	 ";
 //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;



}

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
	  
      <div id="row">
      <div class="row col-sm-12" >
	  
        <div class="col-sm-2"> 

			<div class="row ">
			<nav class="col-sm-12">
          <ul class="nav nav-pills nav-stacked">
            <li> <a href="#"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
			<li> <a href="#"> <span class="glyphicon glyphicon-pencil"></span> LOGIN </a> </li>
            <li> <a href="recherche-v.php"> <span class="glyphicon glyphicon-search"></span> Recherche voiture </a> </li>
			<li> <a href="#"> <span class="glyphicon glyphicon-star-empty"></span> Les plus louées </a> </li>
          
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

        <!-- Projects Row -->
        <div class="row">

             <div class="home">
                    <div class="row">
                    <?php
                
                  while($res=mysql_fetch_array($requete)){
     
                echo(' 
                      <div class="wrap">
                        <div class="box">
                          <div class="product full">
                            <a href="#">
                              <img name="img" src='.$res['image'].' height="255" width="262">
                            </a>
                            <div class="description">
                              '.$res['type'].', <strong>'.$res['marque'].' :</strong>
                              <a href="#" class="price">'.$res['prix'].' €/Km</a>
                            </div>
                            <a href="#" class="gift">
                              Gift
                            </a>
                            <div class="rating">
                              <span>Etat :</span>
                              <ul>');
                              $datetime1 = new DateTime(date("Y-m-d"));
                              $datetime2 = new DateTime($res['finLoc']);
                              $interval = $datetime1->diff($datetime2);
                              $resultat=$interval->format('%a');
                              if($resultat>=0) {echo('<li>DISPONIBLE</li>');} 
                              else {echo('<li>LOUE</li>');}  
                             echo('  </ul>
                            </div>
                            <a class="add addPanier" href="addpanier.php?id='.$res['id'].'">
                              add
                            </a>
                          </div>
                        </div>
                      
                      </div>');    
                                }
?>
                    </div>
                  
                  </div>

           
                	<?php
                
                 /* while($res=mysql_fetch_array($requete)){
                echo(' <div class="col-sm-4 portfolio-item">'); 
                echo('<a href="addpanier.php?id='.$res['id'].'">');
                echo('  <img class="img-responsive"  name="img" src='.$res['image'].' alt="" title="descriptif">
                  <img class="img-responsive"  name="img" src="image/panier.png" alt="" title="ajouter au panier">');
                echo('</a>');
                echo('<h3>');
                echo('<a href="#">Project Name</a>');
                echo('</h3>');
                echo('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>');
                echo('</div>');
              }*/
              ?>
                
        
        </div>
			
	</div>		
</div>
</div>






<script type="text/javascript" src="bootstrap/js/ajout-panier.js"></script>
</body>
</html>

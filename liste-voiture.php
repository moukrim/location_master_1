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
	<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap/jqwidgets/styles/jqx.base.css" type="text/css"/>
  <script type="text/javascript" src="bootstrap/scripts/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="bootstrap/scripts/demos.js"></script>
  <script type="text/javascript" src="bootstrap/jqwidgets/jqxcore.js"></script>
  <script type="text/javascript" src="bootstrap/jqwidgets/jqxdatetimeinput.js"></script>
  <script type="text/javascript" src="bootstrap/jqwidgets/jqxcalendar.js"></script>
  <script type="text/javascript" src="bootstrap/jqwidgets/jqxtooltip.js"></script>
  <script type="text/javascript" src="bootstrap/jqwidgets/globalization/globalize.js"></script>
  </head>

  <body background="image/bg.jpg">
   

<?php 


require 'renvoi-voiture.php';
 echo ('<input type="hidden"  id="num_test" value="'.$_POST['type'].'"/>');
 echo ('<input type="hidden"  id="num_test1" value="'.$_POST['marque'].'"/>');

?>
   <div class="loader" ></div>
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
            <li> <a href="index.php"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
            <li> <a href="log-sign.html"> <span class="glyphicon glyphicon-pencil"></span> LOGIN/SIGN-UP </a> </li>
            <li> <a href="recherche-v.php"> <span class="glyphicon glyphicon-search"></span> Recherche voiture </a> </li>
          
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
                     <div id="'.$res["id"].'" style="margin-left: auto; margin-right: auto;"></div>
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
                            <a href="#" id="cal'.$res["id"].'" class="gift">
                              
                            </a>
                            <div class="rating">
                              <span>Etat :</span>
                             
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
                
        
        </div>
			
	</div>		
</div>
</div>






<script type="text/javascript" src="bootstrap/js/ajout-panier.js"></script>
<script type="text/javascript" src="bootstrap/js/calendrier.js"></script>
<script type="text/javascript" src="bootstrap/js/chargement.js"></script>

</body>
</html>

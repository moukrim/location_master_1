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
if(isset($_POST['img'])){


 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;
 
 //création de la requête SQL
 $sql = "SELECT * FROM vehicule WHERE image='.$_POST['img'].'  ";
 //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
}




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



<div id="panel-fiche">
     <div class="col-sm-8"> 

        <!-- Projects Row -->
        <div class="row">
           
        <div class="panel panel-primary">
          
          <div class="panel-heading">
            <h3 class="panel-title" style="text-align:center;">Fiche Voiture</h3>
          </div>
            <div class="panel-body">
              <?php
              ?>       


            </div>

        </div>
         
        </div>
			
	</div>		

</div>






</body>
</html>

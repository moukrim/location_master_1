<?php
require '_header.php';
//var_dump($_SESSION);

?>

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
        <div class="navbar navbar-default navbar-fixed-top" style="background-color:#BBE1D7 ;">
				  <div class="navbar-header">
         
					 <a class="navbar-brand" href="#">Location voiture</a>
				
				 </div> 
				 
            </div>
      </header>
	  
      <div class="row col-sm-12" >
	  
        <div class="col-sm-2"> 

			<div class="row ">
			<nav class="col-sm-12">
          <ul class="nav nav-pills nav-stacked">
            <li> <a href="#"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
			<li> <a href="log-sign.html"> <span class="glyphicon glyphicon-pencil"></span> LOGIN/SIGN-UP </a> </li>
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
				<div class="panel panel-warning">
				    <div class="panel-heading">
				        <h3 class="panel-title">Reservation</h3>
				    </div>
				    <div class="panel-body">
				    	
				    		<table class="table table-hover">
							    <thead>
							        <tr>
							            <th>Row</th>
							            <th>First Name</th>
							            <th>Last Name</th>
							            <th>Email</th>
							        </tr>
							    </thead>
							    <tbody>
							        <tr>
							            <td>1</td>
							            <td>John</td>
							            <td>Carter</td>
							            <td>johncarter@mail.com</td>
							        </tr>
							       
							    </tbody>
							</table>

				    </div>
			   </div>

			</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12" style="height:30px; ">
										
				
				</div>
			</div>	
			
			
			
			
			
			</div>
        
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
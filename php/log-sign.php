<?php
//yassine

/*#######################################################*/
/* Page de connexion et d'inscription */
/*#######################################################*/

require '_header.php';
?>
<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" charset="utf-8">
	<script src="../bootstrap/js/jquery.js"></script>
  </head>

  <body background="../image/bg.jpg">
   
     <header class="row col-sm-12" >
        <div class="navbar navbar-default navbar-fixed-top" style="background-color:#000101 ;">
				  <div class="navbar-header">
         
					 <a class="navbar-brand" href="index.php" style="color:mintcream;">Location voiture</a>
				
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




     <div class="col-sm-offset-3 col-sm-4"> 

     	 <div class="row">
        	<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"> Connectez-vous</h3>
					</div>
					<div class="panel-body">
						<form role="form">
							<fieldset>
								
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												 <div id="resultatConnexion"></div>
												<input class="form-control"  placeholder="Username" id="loginname" name="loginname" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<div id="resultatConnexion1"></div>
												<input class="form-control" placeholder="Password" id="password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="button" id="submit" value="Sign-in" class="btn btn-info btn-block">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				
                </div>
			

        </div>

        
        <div class="row">

             
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Enregistrer-vous sur notre site <small>C'est gratuit!</small></h3>
					 			</div>
					 			<div class="panel-body">
					 			<div id="enregistre"></div>
					    		<form  >
					    			<div class="row">
					    				<div class="col-xs-6 col-sm-6 col-md-6">
					    					<div id="erreurprenom"></div>
					    					<div class="form-group">
					                <input type="text"  id="prenom" class="form-control input-sm" placeholder="Prenom (min 2 caractères)" >
					    					</div>
					    				</div>
					    				<div class="col-xs-6 col-sm-6 col-md-6">
					    					<div id="erreurnom"></div>
					    					<div class="form-group">
					    						<input type="text"  id="nom" class="form-control input-sm" placeholder="Nom (min 2 caractères)" >
					    					</div>
					    				</div>
					    			</div>

					    			<div class="form-group">
					    				<div id="erreurmail"></div>
					    				<input type="email"  id="email" class="form-control input-sm" placeholder="Adresse Mail (XXX@YYY.ZZ)" onblur="verifMail($(this))">
					    			</div>

					    			<div class="row">
					    				<div class="col-xs-6 col-sm-6 col-md-6">
					    				<div id="erreurmdp"></div>
					    					<div class="form-group">
					    						<input type="password" id="mdp" class="form-control input-sm" placeholder="Mot de passe (min 8 caractères)" >
					    					</div>
					    				</div>
					    				<div class="col-xs-6 col-sm-6 col-md-6">
					    					<div id="erreurmdpconfirm"></div>
					    					<div class="form-group">
					    						<input type="password"  id="mdp_confirmation" class="form-control input-sm" placeholder="Confirmation de mot de passe" >
					    					</div>
					    					
					    				</div>
					    			</div>
					    			
					    			<input type="button" value="Register" id="register" class="btn btn-info btn-block">
					    		
					    		</form>
					    	</div>
			    		</div>
        
        </div>

			
	</div>		
</div>
</div>






 <script src="../bootstrap/js/verif-connection.js"></script>
 <script type="text/javascript" src="../bootstrap/js/verif-inscription.js"></script>

</body>
</html>

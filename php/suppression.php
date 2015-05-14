//cedric teramo
/*#######################################################*/
/* Page qui permet la suppression d'un vehicule ou d'un client */
/*#######################################################*/
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="../bootstrap/css/styles.css" rel="stylesheet">
	  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>

  <body background="../image/bg.jpg">
   <header class="row col-sm-12" >
      <div class="navbar navbar-default navbar-fixed-top" style="background-color:#000;">
        <div class="navbar-header">
         <a class="navbar-brand" style="color: mintcream">Location voiture</a>
        </div> 
         <div class="navbar-form navbar-right" role="search">
          <div class="form-group" style="color: mintcream">
            <strong>
              <?php
                session_start();
                echo  $_SESSION["login"];
              ?>
            </strong>
          </div>
            <button type="submit" class="btn btn-default" id="boutonDeconnexion" onclick="window.location.href='deconnexion.php'" >Deconnexion</button>
        </div>
      </div>
    </header>

     

        <div class="panel-body">
          <form role="form">
            <fieldset>
              <div class="row">
                  <div class="col-sm-4 col-md-4  col-md-offset-4 ">   
               
                      <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a data-toggle="tab" href="#Vehicule">Vehicule</a></li>
                        <li role="presentation"><a data-toggle="tab" href="#Utilisateur">Utilisateur</a></li>
                        </ul>
                  <div class="tab-content">
                    <!--Vehicule-->
                    <div class="tab-pane active" id="Vehicule">     
                      <strong>
                      Suppression d'un vehicule
                    </strong>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-search"></i>
                        </span> 
                         <div id="plaqueInvalide" style="color:red;"></div>
                         <div id="IdentifiantInvalide" style="color:red;"></div>
                         <input class="form-control"  placeholder="Saisir la plaque d'immatriculation" id="plaque" name="plaque" type="text" autofocus>
                      </div>
                    </div>
                    
                    <div class="col-sm-3 col-md-6 col-md-offset-3 ">
                      <div class="form-group">
                        <input type="button" id="boutonRechercherVehicule" value="Rechercher" class="btn btn-info btn-block">
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-6 col-md-offset-3 "id="afficheVehi"> </div>
                     <div class="col-sm-10"id="afficheVehicule" style="margin-left: -200px;"> </div>
                    <div class="modal fade bs-example-modal-sm" id="modal-sup-Vehicule" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content" style="text-align:center; font-size:20px;">
                               Le vehicule a bien été supprimé!
                              </div>
                        </div>
                    </div>
                    </div>
                    <!--Client-->
                    <div class="tab-pane " id="Utilisateur">     
                      <strong>
                      Suppression d'un utilisateur
                    </strong>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-search"></i>
                        </span> 
                         <div id="adrMailInvalide" style="color:red;"></div>
                         <input class="form-control"  placeholder="Saisir l'adresse mail de l'utilisateur" id="adrMail" name="adrMail" type="text" autofocus>
                      </div>
                    </div>
                    
                    <div class="col-sm-3 col-md-6 col-md-offset-3 ">
                      <div class="form-group">
                        <input type="button" id="boutonRechercherClient" value="Rechercher" class="btn btn-info btn-block">
                      </div>
                    </div>   
                    <div class="col-sm-3 col-md-6 col-md-offset-3 "id="afficheCli"  > </div>
                    <div class="col-sm-10"id="afficheClient" style="margin-left: -200px;" > </div>
                  <div class="modal fade bs-example-modal-sm" id="modal-sup-Client" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content" style="text-align:center; font-size:20px;">
                               Le client a bien été supprimé!
                              </div>
                        </div>
                    </div>
                    </div>            
                 
                  </div>
    
              </div>
              </fieldset>
            </form>
          </div>

   <div class="col-sm-offset-8 col-sm-2 col-sm-offset-8">
    <button type="button" class="glyphicon glyphicon-arrow-left" id="RetourMenu" onclick="window.location.href='indexConnecte.php'" > Menu</button>
   </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script  src="../bootstrap/js/traitementRechercheSuppressionVehicule.js"></script>
    <script  src="../bootstrap/js/traitementRechercheSuppressionClient.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>

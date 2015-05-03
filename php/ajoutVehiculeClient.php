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

<div class="row col-sm-offset-2 col-sm-8 col-sm-offset-2">
  <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a data-toggle="tab" href="#Vehicule">Vehicule</a></li>
  <li role="presentation"><a data-toggle="tab" href="#Utilisateur">Utilisateur</a></li>
</ul>
<div class="tab-content">
<!--Vehicule-->
  <div class="tab-pane active" id="Vehicule">
<form class="form-horizontal" enctype="multipart/form-data">
  <div id="typeInvalide"></div>
  <div class="form-group">
    <label for="Type" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="type" name="type" placeholder="Type" >
    </div>
  </div>
  <div id="marqueInvalide"></div>
  <div class="form-group">
    <label for="Marque" class="col-sm-2 control-label">Marque</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="marque" name="marque" placeholder="Marque">
    </div>
  </div>
  <div id="modeleInvalide"></div>
   <div class="form-group">
    <label for="Modele" class="col-sm-2 control-label">Modele</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="modele" name="modele" placeholder="Modele">
    </div>
  </div>
  <div id="plaqueInvalide"></div>
     <div class="form-group">
    <label for="Plaque" class="col-sm-2 control-label">Immatriculation</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="plaque" name="plaque" placeholder="Plaque d'immatriculation">
    </div>
  </div>
  <div id="kilometreInvalide"></div>
  <div class="form-group">
    <label for="Kilometre" class="col-sm-2 control-label">Kilometre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kilometre" name="kilometre" placeholder="Kilometre">
    </div>
  </div>
  <div id="prixInvalide"></div>
    <div class="form-group">
    <label for="Prix" class="col-sm-2 control-label">Prix</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix / Km">
    </div>
  </div>
  <div id="prixJourInvalide"></div>
    <div class="form-group">
    <label for="PrixJour" class="col-sm-2 control-label">Prix / jour</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="prixJour" name="prixJour" placeholder="Prix / jour">
    </div>
  </div>
 <div id="imageInvalide"></div>
  <div class="form-group">
  	<label for="Image" class="col-sm-2 control-label">Image du vehicule</label>
    <div class="col-sm-10">
      <input type="file" name="file" id="file" style="margin-top: +10px;"/>
      <input type ="hidden" name="nbloc" value="0"> 
    </div>
  </div>     
   <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
			<button type="button" class="btn btn-default" id="boutonAjoutVehicule" >Valider</button>
		</div>
</form>
 <div class="modal fade bs-example-modal-sm" id="modal-ajout-Vehicule" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="text-align:center; font-size:20px;">
      Le vehicule a bien été enregistré!
     </div>
  </div>
</div>
</div>


<!---utilisateur-->
<div class="tab-pane " id="Utilisateur">
<form class="form-horizontal" enctype="multipart/form-data">
  <div id="nomInvalide"></div>
  <div class="form-group">
    <label for="Nom" class="col-sm-2 control-label">Nom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" >
    </div>
  </div>
  <div id="prenomInvalide"></div>
  <div class="form-group">
    <label for="Prenom" class="col-sm-2 control-label">Prenom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
    </div>
  </div>
  <div id="adrMailInvalide"></div>
   <div class="form-group">
    <label for="adrMail" class="col-sm-2 control-label">Mail</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="adrMail" name="adrMail" placeholder="Mail">
    </div>
  </div>
  <div id="mdpInvalide"></div>
   <div class="form-group">
    <label for="mdp" class="col-sm-2 control-label">Mot de passe</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
    </div>
  </div>
  
   <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
      <button type="button"  id="boutonAjoutClient" >Valider</button>
    </div>
</form>
</div>
</div>

 <div class="modal fade bs-example-modal-sm" id="modal-ajout-Client" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="text-align:center; font-size:20px;">
      Le client a bien été enregistré!
     </div>
  </div>
</div>
</div>


 

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="../bootstrap/js/ajoutVehicule.js"></script>
   <script src="../bootstrap/js/ajoutClient.js"></script>
   <script src="../bootstrap/js/bootstrap.js"></script>
</body>
<footer>  
  <div class="col-sm-offset-8 col-sm-2 col-sm-offset-8">
    <button type="button" class="glyphicon glyphicon-arrow-left" id="RetourMenu" onclick="window.location.href='indexConnecte.php'" > Menu</button>
   </div>
 </footer>
</html>
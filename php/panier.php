<?php
require '_header.php';
//var_dump($_SESSION);

?>
<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" charset="utf-8">  
  <link href="../bootstrap/css/styles.css" rel="stylesheet">
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script src="../bootstrap/js/jquery.js"></script>
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
    
      <div class="row" > 
      <div class="col-sm-12">

        <div class="col-sm-2"> 

      <div class="row ">
      <nav class="col-sm-12">
          <ul class="nav nav-pills nav-stacked">
            <li> <a href="index.php"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
            <?php require 'bouton-deconnexion.php'; ?>
            <?php require 'verif-possibilite-seconn.php'; ?>
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


<?php


?>
 

    
                <div id="main" class="clearfix">

                    <div class="checkout">
                    
                      
                      <div class="table" style="margin-left:240px; width:83%;">
                        <div class="wrap">

                          <div class="rowtitle">
                            <span class="name">Nom de Produit</span>
                            <span class="price">Prix/KM</span>
                            <span class="quantity">KMs</span>
                            <span class="subtotal">Prix/100KMs</span>
                            <span class="action">Actions</span>
                          </div>

                      
                        <div id="mesForms">
                        <?php
                        $ids=array_keys($_SESSION['panier']);

                          if(!empty($ids)){
                          $comma_separated = implode(",", $ids); 
                          $sql = "SELECT * FROM vehicule WHERE id IN ($comma_separated)";
                          //exécution de la requête SQL
                          $produits = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;

                          while($res=mysql_fetch_array($produits)){
                        echo('
                         <form id="myform'.$res['id'].'" method="post" action="reservation.php" >
                          <div class="row1">
                            <input type="hidden" name="img" value="'.$res['image'].'">
                            <input type="hidden" name="marque" value="'.$res['marque'].'">
                            <input type="hidden" name="modele" value="'.$res['modele'].'">
                            <input type="hidden" name="prix" value="'.$res['prix'].'">
                            <input type="hidden" name="id" value="'.$res['id'].'">
                            
                            <a href="#" class="img" > <img src='.$res['image'].' height="53" ></a>
                            <span class="name" >'.$res['marque'].' '.$res['modele'].'</span>
                            <span class="price" name="prix">'.$res['prix'].' €</span>
                            <span class="quantity"><input class="input_km" name="nbKms" type="text" style="text-align:center" value='.$_SESSION['panier'][$res['id']].'></span>
                            <span class="subtotal">'.number_format($res['prix'] *100, 2, ',', ' ').'€</span>
                            <span class="action">
                              <a href="panier.php?delPanier='.$res['id'].'" class="del"><img src="../img/del.png"></a>
                              <a href="#" id="envoyer'.$res['id'].'"><img src="../img/ok.png"/></a>
                            </span>
                            </div>
                            </form>
                            ');}
                              }
                            ?>
           
                            </div>
                          <div class="rowtotal">
                            <input type="button" id="clcItin"  onclick="displayMap()" class="btn btn-success" value="Calculer Itinéraire">
                          </div>
                          
                        </div>
                      </div>
                      
                    </div>


                  </div>

                  <div id="container" style="margin-left:300px; display:none;">
				        
				        <div id="destinationForm">
				            <form action="" method="get" name="direction" id="direction">
				                <label>Point de départ :</label>
				                <input type="text" name="origin" id="origin">
				                <label>Destination :</label>
				                <input type="text" name="destination" id="destination">
				                <input type="button"  onclick="javascript:calculate()" value="Calculer l'itinéraire">
				            </form>
				        </div>
				        <div id="panel"></div>
				        <div id="map">
				            <p>Veuillez patienter pendant le chargement de la carte...</p>
				        </div>
    			</div>

         

        
</div>
</div>





<script type="text/javascript">
var etat =true;
 function displayMap() {
 	if(etat==true){
    document.getElementById('container').style.display="block";
  	initialize();
  	etat=false;}else{
  		$('#container').hide(1000);
  		etat=true;}
 }
$(document).ready(function () {

  var arrayFromPHP = <?php echo json_encode($ids); ?>;
 
   $.each(arrayFromPHP, function( ind, val ) {

       $("#envoyer"+val).click(function(){

              $('#myform'+val).submit();
            });

   });

});
</script> 

<script type="text/javascript" src="../bootstrap/js/itineraire.js"></script>
</body>
</html>

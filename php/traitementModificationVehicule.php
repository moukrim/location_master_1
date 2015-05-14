//cedric teramo
/*#######################################################*/
/* Page qui permet la modification d'un vehicule dans la base de données */
/*#######################################################*/
<?php

$id = intval($_POST['id']);
$plaque = addslashes($_POST['plaque']);
$type = addslashes($_POST['type']);
$marque = addslashes($_POST['marque']);
$modele = addslashes($_POST['modele']);
$kilometrage = intval($_POST['kilometrage']);
$prix = floatval($_POST['prix']);
$prixJour = floatval($_POST['prixJour']);
$image = addslashes($_POST['image']);

$pathImage = '../image-voiture/'.$image;
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');    
 
$req=mysql_query("UPDATE vehicule SET plaque='$plaque', type='$type', marque='$marque', modele='$modele', kilometrage=$kilometrage, prix=$prix, prixJour=$prixJour, image='$pathImage' WHERE id=$id");
   
if($req){

  echo('mod effectue');
}                            



?>

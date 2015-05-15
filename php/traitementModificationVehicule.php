
<?php
//cedric teramo
/*#######################################################*/
/* Page qui permet la modification d'un vehicule dans la base de données */
/*#######################################################*/
$id = intval($_POST['id']);
$plaque = htmlentities(addslashes($_POST['plaque']), ENT_QUOTES) ;
$type = htmlentities(addslashes($_POST['type']), ENT_QUOTES) ;
$marque = htmlentities(addslashes($_POST['marque']), ENT_QUOTES) ;
$modele = htmlentities(addslashes($_POST['modele']), ENT_QUOTES) ;
$kilometrage = intval($_POST['kilometrage']);
$prix = floatval($_POST['prix']);
$prixJour = floatval($_POST['prixJour']);
$image = htmlentities(addslashes($_POST['image']), ENT_QUOTES) ;

$pathImage = '../image-voiture/'.$image;
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');    
 
$req=mysql_query("UPDATE vehicule SET plaque='$plaque', type='$type', marque='$marque', modele='$modele', kilometrage=$kilometrage, prix=$prix, prixJour=$prixJour, image='$pathImage' WHERE id=$id");
   
if($req){

  echo('mod effectue');
}                            



?>

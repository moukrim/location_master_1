//cedric teramo
/*#######################################################*/
/* Page qui permet la suppression d'un client */
/*#######################################################*/
<?php

$id = intval($_POST['id']);
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');    
 
$req=mysql_query("DELETE FROM utilisateur WHERE id = $id");
   
if($req){

  echo('suppression effectue');
}                            



?>

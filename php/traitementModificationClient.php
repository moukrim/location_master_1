//cedric teramo
/*#######################################################*/
/* Page qui permet de modifier le compte d'un client */
/*#######################################################*/
<?php

$id = intval($_POST['id']);
$nom = addslashes($_POST['nom']);
$prenom = addslashes($_POST['prenom']);
$adrMail = addslashes($_POST['AdrMail']);
$mdp = addslashes($_POST['mdp']);

  $cnx = @mysql_connect('localhost', 'root', '') ;
  $db_selected = mysql_select_db('location');    
 
$req=mysql_query("UPDATE utilisateur SET nom='$nom', prenom='$prenom', adrMail='$adrMail', mdp='$mdp'WHERE id=$id");
   
if($req){

  echo('mod effectue');
}                            



?>

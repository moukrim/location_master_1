
<?php
//cedric teramo
/*#######################################################*/
/* Page qui permet de modifier le compte d'un client */
/*#######################################################*/
$id = intval($_POST['id']);
$nom = htmlentities(addslashes($_POST['nom']), ENT_QUOTES) ;
$prenom = htmlentities(addslashes($_POST['prenom']), ENT_QUOTES) ;
$adrMail = htmlentities(addslashes($_POST['AdrMail']), ENT_QUOTES) ;
$mdp = htmlentities(addslashes($_POST['mdp']), ENT_QUOTES) ;

  $cnx = @mysql_connect('localhost', 'root', '') ;
  $db_selected = mysql_select_db('location');    
 
$req=mysql_query("UPDATE utilisateur SET nom='$nom', prenom='$prenom', adrMail='$adrMail', mdp='$mdp'WHERE id=$id");
   
if($req){

  echo('mod effectue');
}                            



?>

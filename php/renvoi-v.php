<?php 
//yassine

/*#######################################################*/
/* Recuperer les voitures qui ont un type et une marque donnés */
/*#######################################################*/

if(isset($_POST['type']) && isset($_POST['marque']) ){

$type=htmlentities(addslashes($_POST['type']), ENT_QUOTES);
$marque=htmlentities(addslashes($_POST['marque']), ENT_QUOTES);
 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;
 
 //création de la requête SQL
 $sql = "SELECT * FROM vehicule WHERE type='$type' AND marque='$marque'	 ";
 //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;


}
?>
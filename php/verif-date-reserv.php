<?php 
//yassine

/*#######################################################*/
/* Vérification la date de reservation */
/*#######################################################*/

if(isset($_POST['dtdebut']) && isset($_POST['dtfin'])){

$debut= htmlentities(addslashes($_POST['dtdebut']), ENT_QUOTES) ; 
$fin=htmlentities(addslashes($_POST['dtfin']), ENT_QUOTES) ;

 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;

  $sql = "SELECT DISTINCT idVehicule FROM reservation WHERE ('$debut' <= finReserv AND '$debut' >= debutReserv) OR ('$fin' >= debutReserv AND '$fin' <= finReserv)";
 //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
   $tab=array();
  while($res=mysql_fetch_object($requete)){
  	array_push($tab, $res->idVehicule);
  }
echo json_encode($tab);


}

?>
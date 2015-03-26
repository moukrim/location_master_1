<?php 
if(isset($_POST['dtdebut']) && isset($_POST['dtfin'])){

$debut=$_POST['dtdebut'];
$fin=$_POST['dtfin'];

 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;
 
 //création de la requête SQL
 /*$sql = "SELECT DISTINCT id FROM vehicule 
 WHERE (debutReserv>'2015-03-15' AND debutReserv>'2015-04-01') 
 OR (finReserv<'2015-03-15' AND finReserv<'2015-04-01')
  AND idVehicule NOT 
  IN (SELECT idVehicule FROM reservation WHERE ('2015-03-15' AND '2015-04-01') BETWEEN debutReserv AND finReserv)";('$debut' <= finReserv AND '$fin' >= debutReserv))*/

  $sql = "SELECT * FROM vehicule WHERE id NOT IN (SELECT DISTINCT idVehicule FROM reservation WHERE ('$debut' <= finReserv AND '$debut' >= debutReserv) OR ('$fin' >= debutReserv AND '$fin' <= finReserv))";
 //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
   $tab=array(array());
   $i=0;
  while($res=mysql_fetch_object($requete)){

	$tab[$i]['id']= $res->id;
	$tab[$i]['type']= $res->type;  
	$tab[$i]['marque']= $res->marque;
	$tab[$i]['prix']= $res->prix;	
	$tab[$i]['image']= $res->image;		
	$i++;

  }
echo json_encode($tab);


}

?>
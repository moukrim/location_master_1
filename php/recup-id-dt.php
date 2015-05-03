<?php 
//yassine
if(isset($_POST['dtdebut']) && isset($_POST['dtfin'])){

$debut=addslashes($_POST['dtdebut']) ;
$fin=addslashes($_POST['dtfin']) ;

 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;

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
	$tab[$i]['modele']=$res->modele;
	$i++;

  }
echo json_encode($tab);


}

?>
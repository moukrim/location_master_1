<?php 
//yassine

/*#######################################################*/
/* Recuperer les voitures disponibles */
/*#######################################################*/

if(isset($_POST['dtdebut']) && isset($_POST['dtfin'])){

$debut=htmlentities(addslashes($_POST['dtdebut']), ENT_QUOTES);
$fin=htmlentities(addslashes($_POST['dtfin']), ENT_QUOTES);

 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;

  $sql = "SELECT * FROM vehicule WHERE id NOT IN (SELECT DISTINCT idVehicule FROM reservation WHERE ('$debut' <= finReserv AND '$debut' >= debutReserv) OR ('$fin' >= debutReserv AND '$fin' <= finReserv))";
 //exécution de la requête SQL
  $requete = @mysql_query($sql) ;
  $req = @mysql_query($sql) ;
 $test=mysql_fetch_row($requete);
  if(!$test){

  	echo json_encode('indisponible');
  }else{

   $tab=array(array());
   $i=0;
  while($res=mysql_fetch_object($req)){

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

}

?>
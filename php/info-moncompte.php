

<?php 
//yassine
if(isset($_POST['id'])){
$idU=intval($_POST['id']);//éviter l'injection sql
 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;

  $sql = "SELECT idVehicule from reservation where idUtilisateur=$idU GROUP BY idVehicule";
 //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;

  // $tab=array();
   $table=array();
   $tableau=array();
  while($res=mysql_fetch_array($requete)){
  	$resultat=$res['idVehicule'];

		$sq="SELECT * FROM `vehicule` WHERE id='$resultat'";
	 		$re = @mysql_query($sq, $cnx) or die($sq."<br>".mysql_error()) ;
		    $p=mysql_fetch_array($re);
	 			array_push($table, $p['modele'],$p['type'],$p['image'],$p['id']);
	 			 array_push($tableau, $table);
	 			 $table= array();
	 
}
echo json_encode($tableau);
//echo json_encode($table);
}

  





?>
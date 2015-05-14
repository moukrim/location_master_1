<?php
//cedric teramo
/*#######################################################*/
/* Page qui permet de recupérer et de d'additonner les sommes rapporter par vehicule 
et de les renvoyer dans un tableau avec comme index l'id du vehicule correspondant*/
/*#######################################################*/
  $cnx = @mysql_connect('localhost', 'root', '') ;
  $db_selected = mysql_select_db('location');    
 //on recupère chauqe id de vehicule
$result=mysql_query("SELECT DISTINCT idVehicule FROM reservation");

//on declare 2 tableaux
$rows = array();
$som=array();
while($r = mysql_fetch_array($result)) {
	//on recupère tout les prix par id de vehicule
	$res=mysql_query("SELECT prixFinale FROM reservation where idVehicule=".$r['idVehicule']."");

	while($re = mysql_fetch_array($res))
	{
			//on effectue la somme des prix pour chaque vehicule
			array_push($som, $re['prixFinale']);
	}
	//on met dans le tableau rows la somme totale avec comme index l'id du vehicule
	$rows[$r['idVehicule']]=array_sum($som);
	//on reinitialse le tableau som
	$som=array();

}
echo json_encode($rows);

?>

<?php

  $cnx = @mysql_connect('localhost', 'root', '') ;
  $db_selected = mysql_select_db('location');    
 
$result=mysql_query("SELECT DISTINCT idVehicule FROM reservation");

$rows = array();
$som=array();
while($r = mysql_fetch_array($result)) {

	$res=mysql_query("SELECT prixFinale FROM reservation where idVehicule=".$r['idVehicule']."");

	while($re = mysql_fetch_array($res))
	{

			array_push($som, $re['prixFinale']);
	}

	$rows[$r['idVehicule']]=array_sum($som);
	$som=array();

}
echo json_encode($rows);

?>
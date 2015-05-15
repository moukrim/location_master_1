<?php

  $cnx = @mysql_connect('localhost', 'root', 'root') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');
	
	$sql = 'SELECT nom_fr_fr FROM marque ORDER BY nom_fr_fr';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	
	$res=array();
	while( $result = mysql_fetch_assoc( $req ))
	{
	array_push($res, utf8_encode($result['nom_fr_fr']));
	}
	
	echo (json_encode($res));
	
?>
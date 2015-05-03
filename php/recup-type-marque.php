<?php
 //yassine
 //création de la requête SQL
 $sql = "SELECT type FROM vehicule GROUP BY type	";
 //exécution de la requête SQL
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;


 //création de la requête SQL
 $sq = "SELECT marque FROM vehicule WHERE type='4X4' GROUP BY marque	";
 //exécution de la requête SQL
$re = @mysql_query($sq, $cnx) or die($sq."<br>".mysql_error()) ;

 //création de la requête SQL
 $s = "SELECT marque FROM vehicule WHERE type='Berline' GROUP BY marque ";
 //exécution de la requête SQL
$r = @mysql_query($s, $cnx) or die($s."<br>".mysql_error()) ;

 //création de la requête SQL
 $ss = "SELECT marque FROM vehicule WHERE type='Citadine' GROUP BY marque	";
 //exécution de la requête SQL
$rr = @mysql_query($ss, $cnx) or die($ss."<br>".mysql_error()) ;





?>
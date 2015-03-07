<?php
 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;
require 'panier.class.php';
$panier=new panier();

?>
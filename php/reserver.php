<?php 
//Valeurs du serveur SQL
$host = '127.0.0.1'; 
$user = 'root'; 
$pass = ''; 


$dtdebut = $_POST ['dtdebut'];
$dtfin = $_POST ['dtfin']; 
$idVehicule = $_POST['idVehicule']; 
$idUtilisateur = $_POST['idUtilisateur']; 

$link=@mysql_connect ($host,$user,$pass);
if (!$link) {
die ('Erreur de connection au serveur '.mysql_error() ) ;
}

$db=mysql_select_db('location');
if (!$db) 
{
die ('Impossible de sélectionner la base de données : ' . mysql_error());
}

$table=mysql_query("Insert Into reservation (idReserv, debutReserv, finReserv, idUtilisateur, idVehicule) values ('', '$dtdebut' , '$dtfin' , '$idUtilisateur' , '$idVehicule');");


$tab=mysql_query("UPDATE vehicule SET nbLoc=nbLoc+1 WHERE id='$idVehicule'");
if ($table && $tab)
{
echo('insert-reussie');
}




 
?>
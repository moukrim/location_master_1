<?php 
//yassine

/*#######################################################*/
/* Insérer les données de reservation dans la BDD */
/*#######################################################*/

//Valeurs du serveur SQL
$host = '127.0.0.1'; 
$user = 'root'; 
$pass = ''; 


$dtdebut =htmlentities(addslashes($_POST ['dtdebut']), ENT_QUOTES);
$dtfin =htmlentities(addslashes($_POST ['dtfin']),ENT_QUOTES); 
$idVehicule =intval($_POST['idVehicule']); 
$idUtilisateur =intval($_POST['idUtilisateur']); 
$prixFinale =htmlentities(addslashes($_POST['prix']), ENT_QUOTES); 

$link=@mysql_connect ($host,$user,$pass);
if (!$link) {
die ('Erreur de connection au serveur '.mysql_error() ) ;
}

$db=mysql_select_db('location');
if (!$db) 
{
die ('Impossible de sélectionner la base de données : ' . mysql_error());
}

$table=mysql_query("Insert Into reservation (idReserv, debutReserv, finReserv, idUtilisateur, idVehicule, prixFinale, dtReserv) values ('', '$dtdebut' , '$dtfin' , $idUtilisateur , $idVehicule , '$prixFinale' , NOW());");


$tab=mysql_query("UPDATE vehicule SET nbLoc=nbLoc+1 WHERE id='$idVehicule'");
if ($table && $tab)
{
echo('insert-reussie');
}




 
?>
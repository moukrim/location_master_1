<?php 
//Valeurs du serveur SQL
$host = '127.0.0.1'; 
$user = 'root'; 
$pass = ''; 

// On récupère les valeurs du formulaire
$nom = $_POST ['nom']; 
$prenom = $_POST['prenom'];  
$mail = $_POST['mail']; 
$mdp = $_POST['mdp']; 




/*
print("$societe, $nom, $prenom, $email, $telephone"); 
*/


$link=@mysql_connect ($host,$user,$pass);
if (!$link) {
die ('Erreur de connection au serveur '.mysql_error() ) ;
}

$db=mysql_select_db('location');
if (!$db) 
{
die ('Impossible de sélectionner la base de données : ' . mysql_error());
}

//Tables
$table=mysql_query("Insert Into utilisateur (id, nom, prenom, adrMail, mdp) values ('', '$nom' , '$prenom' , '$mail' , '$mdp');");
if (!$table)
{
die ('ERREUR'.mysql_error() ) ;
}
header('Location: enregistrer.php'); 
?>
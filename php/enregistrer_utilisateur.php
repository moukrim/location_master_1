<?php 
//yassine

/*#######################################################*/
/* Ajouter un nouveau utilisateur */
/*#######################################################*/

//Valeurs du serveur SQL
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mdp'])) {
	# code...

	$host = '127.0.0.1'; 
	$user = 'root'; 
	$pass = ''; 

	// On récupère les valeurs du formulaire
	$nom = addslashes($_POST ['nom']); 
	$prenom = addslashes($_POST['prenom']);  
	$mail = addslashes($_POST['mail']); 
	$mdp = addslashes($_POST['mdp']); 


	$link=@mysql_connect ($host,$user,$pass);
	if (!$link) {
		die ('Erreur de connection au serveur '.mysql_error() ) ;
	}

	$db=mysql_select_db('location');
	if (!$db) {
		die ('Impossible de sélectionner la base de données : ' . mysql_error());
		}

	//Tables
	$table=mysql_query("Insert Into utilisateur (id, nom, prenom, adrMail, mdp) values ('', '$nom' , '$prenom' , '$mail' , '$mdp')");
	if ($table){
		echo 'enregistre';
	}
}
?>
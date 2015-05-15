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
	$nom =htmlentities(addslashes($_POST ['nom']), ENT_QUOTES); 
	$prenom =htmlentities(addslashes($_POST['prenom']), ENT_QUOTES);  
	$mail =htmlentities(addslashes($_POST['mail']), ENT_QUOTES); 
	$mdp =htmlentities(addslashes($_POST['mdp']), ENT_QUOTES); 


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
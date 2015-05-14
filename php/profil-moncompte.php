<?php 
//yassine

/*#######################################################*/
/* Recuperer les informations du profil utilisateur */
/*#######################################################*/

if(isset($_POST['id'])){
	
	$id=intval($_POST['id']);//éviter l'injection sql
	$cnx = @mysql_connect('localhost', 'root', '') ;
	 //sélection de la base de données
	$db  = mysql_select_db('location') ;

	$table=array();
		$s="SELECT * FROM utilisateur WHERE id= $id ";
		$req = @mysql_query($s, $cnx) or die($s."<br>".mysql_error()) ;	

		$res=mysql_fetch_array($req);
			   	$table['nom']=$res['nom'];
			   	$table['prenom']=$res['prenom'];
			   	$table['adrMail']=$res['adrMail'];
			   	$table['mdp']=$res['mdp'];
	 			
echo json_encode($table);	 
}
?>
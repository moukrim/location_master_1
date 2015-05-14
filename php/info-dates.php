

<?php 
//yassine

/*#######################################################*/
/* Recuperer les informations d'une reservation */
/*#######################################################*/

if(isset($_POST['id']) && isset($_POST['idU'])){
	
	$idv=intval($_POST['id']);//éviter l'injection sql
	$idu=intval($_POST['idU']);
	$cnx = @mysql_connect('localhost', 'root', '') ;
	 //sélection de la base de données
	$db  = mysql_select_db('location') ;

	$tableau=array();
	$table=array();
		$s="SELECT * FROM reservation WHERE idVehicule=$idv AND idUtilisateur=$idu";
		$req = @mysql_query($s, $cnx) or die($s."<br>".mysql_error()) ;	

		   while($res=mysql_fetch_array($req)){
			   	array_push($tableau, $res['debutReserv'],$res['finReserv'],$res['prixFinale'],$res['dtReserv'],$res['idReserv']);
				array_push($table, $tableau);
			   	$tableau=array();
		   }
	 			
	 
}
echo json_encode($table);

?>
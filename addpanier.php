<?php 
require '_header.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];

$sql = "SELECT id FROM vehicule WHERE id='$id'";
 //exécution de la requête SQL
 $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
 $res=mysql_fetch_object($requete);

if(empty($res)){
		$json['message'] = "Ce produit n'existe pas";
	}else{
		$panier->add($res->id);
		$json['error']  = false;
		//$json['total']  = number_format($panier->total(),2,',',' ');
		//$json['count']  = $panier->count();
		$json['message'] = 'Le produit a bien été ajouté à votre panier';
	}
}else{
	$json['message'] = "Vous n'avez pas sélectionné de produit à ajouter au panier";
}
echo json_encode($json);
 

?>
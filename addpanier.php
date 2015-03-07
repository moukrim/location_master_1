<?php 
require '_header.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];

$sql = "SELECT id FROM vehicule WHERE id='$id'";
 //exécution de la requête SQL
 $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
 $res=mysql_fetch_object($requete);
 $panier->add($res->id);
 die('Le produit a bien été ajouté à votre panier');
}else{


	die("vous n'avez pas selectionner le produit");
}
?>
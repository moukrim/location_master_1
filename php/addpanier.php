<?php 
//yassine
require '_header.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];

if(empty($id)){
		$json['message'] = "Ce produit n'existe pas";
	}else{
		$panier->add($id);
		$json['error']  = false;
		$json['message'] = 'Le produit a bien ete ajoute a votre panier';
	}
}else{
	$json['message'] = "Vous n'avez pas selectionne de produit a ajouter au panier";
}
echo json_encode($json);
 

?>
<?php
//yassine

/*#######################################################*/
/* Creation de comparateur */
/*#######################################################*/

class panier{

public function __construct(){

	if(!isset($_SESSION)){
		session_start();

	}
	if(!isset($_SESSION['comp'])){
		$_SESSION['comp']=0;
	}
	if(!isset($_SESSION['panier'])){
		$_SESSION['panier']=array();
		

	}

	if(isset($_GET['delPanier'])){
		$this->del($_GET['delPanier']);

	}




}

//ajout de vehicule(s) au comparateur
public function add($product_id){
	if(isset($_SESSION['panier'][$product_id])){
	 $_SESSION['panier'][$product_id]=1;
	}
	elseif(!isset($_SESSION['panier'][$product_id])){
	$_SESSION['panier'][$product_id]=1;
	$_SESSION['comp']++;

	}
	
	
	

}

//suppression de vehicule(s) du comparateur
public function del($product_id){
	if(isset($_SESSION['panier'][$product_id])){
		unset($_SESSION['panier'][$product_id]);
		$_SESSION['comp']--;
	}
		

	}

}



?>



<?php 

if(isset($_POST['type']) && isset($_POST['marque']) ){

$type=$_POST['type'];
$marque=$_POST['marque'];
 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;
 
 //création de la requête SQL
 $sql = "SELECT * FROM vehicule WHERE type='$type' AND marque='$marque'	 ";
 //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
$tab=array(array());
$i=0;
  while($res=mysql_fetch_object($requete)){

	$tab[$i]['id']= $res->id;
	$tab[$i]['type']= $res->type;  
	$tab[$i]['marque']= $res->marque;
	$tab[$i]['prix']= $res->prix;	
	$tab[$i]['image']= $res->image;		
	$i++;

  }
echo json_encode($tab);
  

}
?>
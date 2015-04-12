<?php 

if(isset($_POST['id'])  ){

	$id=$_POST['id'];

 $cnx = @mysql_connect('localhost', 'root', '') ;
 //sélection de la base de données
 $db  = mysql_select_db('location') ;
 
 //création de la requête SQL
 $sql = "SELECT debutReserv, finReserv FROM reservation WHERE idVehicule='$id' ";


 //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx);


 $dates=[];

$tab = [];
if (@mysql_num_rows($requete)>0) {
while($res=mysql_fetch_assoc($requete)){
	$result1 =$res['debutReserv'];
  	$result2 =$res['finReserv'];

  	$dates = getDatesBetween($result1, $result2); 

  	array_unshift($tab, $dates);
    

}	
//var_dump($tab);

echo json_encode($tab);

}
else {
echo json_encode('ko');
}


  
}



  function getDatesBetween($start, $end)
{
if($start > $end)
{
return false;
} 

$sdate = strtotime("$start ");
$edate = strtotime($end);

$dates = array();

for($i = $sdate; $i <= $edate; $i += strtotime('+1 day', 0))
{
$dates[] = date('Y-m-d', $i);
}

return $dates;
}

?>

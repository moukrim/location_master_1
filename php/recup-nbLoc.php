 <?php
 //yassine
$sql = "SELECT * FROM vehicule ORDER BY nbLoc DESC LIMIT 0,4";
//exécution de la requête SQL
$req = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;

$couleur= array('active','active','active','active');

$i=0;
while($res=mysql_fetch_array($req)){
	echo('

	<tr class="'.$couleur[$i++].'">
	 <td>'.$res['marque'].'</td>
	 <td>'.$res['type'].'</td>
	 <td>'.$res['modele'].'</td>
	 <td>'.number_format($res['prix'] *150, 2, ',', ' ').'€</td>
	</tr>
	');
}
?>
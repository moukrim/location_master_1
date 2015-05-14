
  <?php
  //yassine

/*#######################################################*/
/* Annuler une réservation avec la condition que le client connecte
	qui peut l'annuler et avant la date de debut de reservation
*/
/*#######################################################*/

if(isset($_POST['id']) && isset($_POST['idU'])){
	$id=intval($_POST['id']);
	$idU=intval($_POST['idU']);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "location";

	// Creer connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Verif connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "DELETE FROM reservation WHERE idReserv= $id AND idUtilisateur=$idU AND NOW()<debutReserv";
	$conn->query($sql);
	if ($conn->affected_rows !=0) {
	    echo json_encode("oui") ;
	}else {
	   echo json_encode("non") ;
	} 

	$conn->close();
}
?>
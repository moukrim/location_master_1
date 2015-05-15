
<?php
//cedric teramo
/*#######################################################*/
/* Page qui permet de recupérer les informations concernant un vehicule */
/*#######################################################*/
if($_POST["plaque"] != "" )
{

 $plaque =htmlentities(addslashes($_POST["plaque"]), ENT_QUOTES) ;
  //connexion au serveur
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');    
 
    $sql="SELECT * FROM vehicule WHERE plaque='$plaque'";
    $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
    //on récupère le résultat
    $resultat=array();
   $res=mysql_fetch_array($requete);

   $resultat['id']=$res['id'];
   $resultat['type']=$res['type'];
   $resultat['marque']=$res['marque'];
   $resultat['modele']=$res['modele'];
   $resultat['plaque']=$res['plaque'];
     
      echo json_encode($resultat);
}
?>

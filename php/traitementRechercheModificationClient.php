
<?php
//cedric teramo
/*#######################################################*/
/* Page qui permet de recupérer les informations concernant un client */
/*#######################################################*/
if($_POST["adrMail"] != "" )
{

 $adrMail =htmlentities(addslashes($_POST["adrMail"]), ENT_QUOTES) ;
  //connexion au serveur
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');    
 
    $sql="SELECT * FROM utilisateur WHERE adrMail='$adrMail'";
    $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
    //on récupère le résultat
   $resultat=array();
   $res=mysql_fetch_array($requete);

   $resultat['id']=$res['id'];
   $resultat['nom']=$res['nom'];
   $resultat['prenom']=$res['prenom'];
   $resultat['adrMail']=$res['adrMail'];
   $resultat['mdp']=$res['mdp'];

     
      echo json_encode($resultat);
}
?>

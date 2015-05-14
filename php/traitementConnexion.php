
<?php
//cedric teramo
/*#######################################################*/
/* Page qui permet à l'administrateur de se connecter*/
/*#######################################################*/
if($_POST["identifiant"] != "" && $_POST["mdp"] != "")
{
 $login     = addslashes($_POST["identifiant"] );
 $pass      = addslashes($_POST["mdp"] );
 
  //connexion au serveur
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');
 
  //création de la requête SQL
  $sql = "SELECT * FROM admin WHERE adresseMail = '$login' AND motPasse = '$pass'" ;
  //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
  //on récupère le résultat
  $result = mysql_fetch_object($requete) ;
  //si la requête s'est bien passée
  if(is_object($result))
  {
    //début de la session
    session_start() ;
    //enregistrement d'une variable de session, ici le login de l'utilisateur
    $_SESSION["login"]= $result->nom ;
    echo json_encode('connexion reussie');
  }
  else
  {
    echo json_encode('connexion refusée');
  }
}
else
{
  echo json_encode("pas de poste ");
}
?>

<?php
//yassine

/*#######################################################*/
/* Vérification de la connection */
/*#######################################################*/

if($_POST["mail"] != "" && $_POST["pass"] != "")
{
  $mail = htmlentities(addslashes($_POST["mail"]), ENT_QUOTES);
  $pass = htmlentities(addslashes($_POST["pass"]), ENT_QUOTES);
 
  //connexion au serveur
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db  = mysql_select_db('location') ;
 
  //création de la requête SQL
  $sql = "SELECT * FROM utilisateur WHERE adrMail = '$mail' AND mdp = '$pass'"	;
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
    $_SESSION["prenom"]=$result->prenom;
    $_SESSION["id"] = $result->id ;
 
    echo ("connectionOk");
  }//fin if

  else
  { 
	
    echo ("connectionKo");
  }//fin else
}//fin if

?>
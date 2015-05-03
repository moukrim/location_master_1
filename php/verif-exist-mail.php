<?php
//yassine
if($_POST["mail"] != "")
{
  $mail = addslashes($_POST["mail"]) ;
 
  //connexion au serveur
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db  = mysql_select_db('location') ;
 
  //création de la requête SQL
  $sql = "SELECT * FROM utilisateur WHERE adrMail ='$mail'"	;
  //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
  //on récupère le résultat
  $result = mysql_fetch_object($requete) ;
  //si la requête s'est bien passée
  if(is_object($result))
  {
    
    echo ("existe");
  }//fin if
  //sinon on retourne à la page d'inscription
  else
  { 
	
    echo ("non existant");
  }//fin else
}//fin if

?>
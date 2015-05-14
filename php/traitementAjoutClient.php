

<!--cedric teramo
#######################################################
 Page qui permet d'ajouter un client dans la base de données
####################################################### 
-->
<?php
if($_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["adrMail"] != "" && $_POST["mdp"] != "")

{
 $nom     = addslashes($_POST["nom"]) ;
 $prenom  = addslashes($_POST["prenom"]) ;
 $adrMail = addslashes($_POST["adrMail"]) ;
 $mdp     = addslashes($_POST["mdp"]) ;

  //connexion au serveur
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');

  //création de la requête SQL

  $req=mysql_query("Insert Into utilisateur (id, nom, prenom, adrMail, mdp) values ('0', '$nom', '$prenom', '$adrMail', '$mdp');");

if ($req)  
{
echo ("ajout reussie");
}
else
{
  echo("ajout refuse");
  die ('ERREUR'.mysql_error() ) ;

}//fin else


}


?>

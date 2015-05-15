
<?php
//cedric teramo
/*#######################################################*/
/*  Page qui permet d'ajouter un client dans la base de données*/
/*#######################################################*/
if($_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["adrMail"] != "" && $_POST["mdp"] != "")

{
 $nom     = htmlentities(addslashes($_POST["nom"]), ENT_QUOTES);
 $prenom  = htmlentities(addslashes($_POST["prenom"]), ENT_QUOTES);
 $adrMail = htmlentities(addslashes($_POST["adrMail"]), ENT_QUOTES);
 $mdp     = htmlentities(addslashes($_POST["mdp"]), ENT_QUOTES);

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

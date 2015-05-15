
<?php
//cedric teramo
/*#######################################################*/
/*  Page qui permet d'ajouter un vehicule dans la base de données*/
/*#######################################################*/
if($_POST["type"] != "" && $_POST["marque"] != "" && $_POST["modele"] != "" && $_POST["plaque"] != "" && $_POST["kilometre"] != "" && $_POST["prix"] != "" && $_POST["prixJour"] != "" && $_POST["file"] != "")

{
 $type      = htmlentities(addslashes($_POST["type"]), ENT_QUOTES);
 $marque    = htmlentities(addslashes($_POST["marque"]), ENT_QUOTES);
 $modele    = htmlentities(addslashes($_POST["modele"]), ENT_QUOTES);
 $plaque    = htmlentities(addslashes($_POST["plaque"]), ENT_QUOTES);
 $kilometre = intval($_POST["kilometre"] );
 $prix      = floatval($_POST["prix"]) ;
 $prixJour  = intval($_POST["prixJour"]);
 $file      = htmlentities() addslashes($_POST["file"], ENT_QUOTES);
 $nbloc     = intval($_POST["nbloc"]);
$pathImage = '../image-voiture/'.$file;
  //connexion au serveur
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');

  
  $req=mysql_query("Insert Into vehicule (id, plaque, type, marque, modele, kilometrage, prix, prixJour, image, nbLoc) values ('0', '$plaque', '$type', '$marque' , '$modele' , '$kilometre', '$prix', '$prixJour', '$pathImage','0');");
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


<?php
if($_POST["type"] != "" && $_POST["marque"] != "" && $_POST["modele"] != "" && $_POST["plaque"] != "" && $_POST["kilometre"] != "" && $_POST["prix"] != "" && $_POST["prixJour"] != "" && $_POST["file"] != "")

{
 $type      = addslashes($_POST["type"]) ;
 $marque    = addslashes($_POST["marque"]) ;
 $modele    = addslashes($_POST["modele"]) ;
 $plaque    = addslashes($_POST["plaque"]) ;
 $kilometre = intval($_POST["kilometre"] );
 $prix      = floatval($_POST["prix"]) ;
 $prixJour  = intval($_POST["prixJour"]);
 $file      = addslashes($_POST["file"]) ;
 $nbloc     = intval($_POST["nbloc"]);
$pathImage = '../image-voiture/'.$file;
  //connexion au serveur
  $cnx = @mysql_connect('localhost', 'root', '') ;
  //sélection de la base de données
  $db_selected = mysql_select_db('location');

  //création de la requête SQL
  
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
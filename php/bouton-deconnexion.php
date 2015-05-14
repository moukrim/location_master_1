<?php 
//yassine

/*#######################################################*/
/* afficher la rubrique deconnexion si le client est connecté */
/*#######################################################*/

if (isset($_SESSION['prenom'])) {

echo(' <li> <a href="deconnexion.php" style="color:red;"> <span class="glyphicon glyphicon-off"></span> Deconnexion </a> </li>');
}?>
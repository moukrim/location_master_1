<?php 
//yassine

/*##########################################################################################*/
/* Ajouter un la rubrique de connection et inscription si l'utilisateur n'est pas connecté */
/*#########################################################################################*/

if (!isset($_SESSION['prenom'])) {

echo(' <li> <a href="log-sign.php"> <span class="glyphicon glyphicon-pencil"></span> LOGIN/SIGN-UP </a> </li>');
}?>
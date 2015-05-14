<?php
//yassine
/*#######################################################*/
/* sétruire les sessions apres la deconnexion*/
/*#######################################################*/

session_start();
unset($_SESSION['id']);
unset($_SESSION['prenom']);
unset($_SESSION['login']);
//session_destroy();
header('Location: index.php');
exit();
?>
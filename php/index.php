<?php 
//yassine
/*#######################################################*/
/* Acces soit dans une page deconnecte ou une page connecte */
/*#######################################################*/

session_start();

if($_SESSION['id']){
   header('Location: page_connecte.php');
      
}else{        
    header('Location: page_deconnecte.php');
}
?>
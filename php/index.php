<?php 
//yassine
session_start();

if($_SESSION['id']){
   header('Location: page_connecte.php');
      
}else{        
    header('Location: page_deconnecte.php');
}
?>
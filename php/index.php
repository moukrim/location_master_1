<?php 
session_start();

if($_SESSION['nom']){
   header('Location: page_connecte.php');
      
}else{        
    header('Location: page_deconnecte.php');
}
?>
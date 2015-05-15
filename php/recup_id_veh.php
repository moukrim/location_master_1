<?php
//yassine

/*#######################################################*/
/* Recuperer les ids des véhicules */
/*#######################################################*/
require 'renvoi-v.php';
 while($res=mysql_fetch_assoc($requete)){
    $result[] =$res['id'];

  }
 

echo json_encode($result);
?>
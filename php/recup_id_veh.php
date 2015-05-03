<?php
//yassine
require 'renvoi-v.php';
 while($res=mysql_fetch_assoc($requete)){
    $result[] =$res['id'];

  }
 

echo json_encode($result);
?>
<?php
session_start();
unset($_SESSION['nom']);
//session_destroy();
header('Location: index.php');
exit();
?>
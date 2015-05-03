<?php
//yassine
     $to      = 'moukrim_yassine@hotmail.fr';
     $subject = 'le sujet';
     $message = 'Bonjour !';
     $headers = 'From: mohamedmadad@sfr.fr' . "\r\n" .
     'Reply-To: moukrim_yassine@hotmail.fr' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);
 ?>
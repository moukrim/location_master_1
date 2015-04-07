<?php
     $to      = 'moukrim_yassine@hotmail.fr';
     $subject = 'le sujet';
     $message = 'Bonjour !';
     $headers = 'From: moukrim.yassine.93@gmail.com' . "\r\n" .
     'Reply-To: moukrim.yassine.93@gmail.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);
 ?>
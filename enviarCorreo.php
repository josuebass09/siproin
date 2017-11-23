<?php
$to      = 'josuebass09@gmail.com';
$subject = 'Prueba';
$message = 'Esto es una prueba';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
echo "Correo enviado!";
?> 
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';


// Habilitando o PHPMailer
$mail = new PHPMailer(true);
try
{
    // Configurações do servidor
    $mail->isSMTP();        //Define o uso de SMTP no envio
    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    $mail->Username   = 'ellenmonteiro000@gmail.com';
    $mail->Password   = 'bsna vfub kgmq wyxi';//Senha de app (não é a senha do meu email); É própria para uso de SMTP
    // Criptografia do envio SSL é aceito
    $mail->SMTPSecure = 'tls';
    // Informações específicadas pelo Google
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    // Define o remetente
    $mail->setFrom('ellenmonteiro000@gmail.com', 'Ellen_MS');
    // Define o destinatário
    $email = $_POST['email'];
    $mail->addAddress($email, 'Destinatário');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Define o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Redefinicao de Senha!';//Assunto
    $mail->Body    = 'Olá, seu pedido de redefinição de senha será feito.';//Corpo do texto
    $mail->AltBody = 'Olá, seu pedido de redefinição de senha será feito.';//Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML
    // Enviar
    $mail->send();
    echo 'A mensagem foi enviada!';
}
catch (Exception $e)
{
    echo "A Mensagem nao pode ser enviada. Mailer Error: {$mail->ErrorInfo}";
}	

?>
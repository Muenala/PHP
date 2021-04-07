<?php
setlocale(LC_TIME, 'spanish');
date_default_timezone_set('America/Guayaquil');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


try {
    $mail = new PHPMailer(exceptions: true);
    $mail->SMTPDebuh = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->Username = 'remitente@ejemplo.com';
    $mail->Password = 'passwordRemitente';
    $mail->setFrom(address: 'remitente@ejemplo.com');
    $mail->Subject = 'Asunto';
    $mail->addAddress(address: 'destino@ejemplo.com');
    $mail->MsgHTML('
                    <!DOCTYPE html
                    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <title>Demystifying Email Design</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    </head>
                    ');

    $mail->send();
} catch (Exception $exception) {
    echo 'Algo salio mal', $exception->getMessage();
}

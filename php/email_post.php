<?php
require("php_mailer/PHPMailerAutoload.php");
if ($_POST["phone"] || $_POST["name"]) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
//    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
//    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.timeweb.ru";
    $mail->Port = 2525; // or 587
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "tcp@t-c-p.ru";
    $mail->Password = "DB8FhvO7";
    $mail->SetFrom("tcp@t-c-p.ru");
    $mail->Subject = "Заявка с сайта";
    $mail->Body = "Новая заявка с сайта.<br>Имя : $name<br>Номе телефона : $phone";
    $mail->AddAddress("422080t@rambler.ru");
    if (!$mail->Send()) {
        echo 'Message was not sent!.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: success.html');
    }
}
?>
<?php

namespace App\Classes;


class SendMail
{
    public function send()
    {
        //Create a new PHPMailer instance
        $mail = new \PHPMailer;
        // Set PHPMailer to use the sendmail transport
        $mail->isSendmail();
        //кодировка сайта
        $mail->CharSet = 'utf-8';
        //Set who the message is to be sent from
        $mail->setFrom('from@example.com', 'First Last');
        //Set who the message is to be sent to
        $mail->addAddress('semho@yandex.ru', 'Имя кому отправляется письмо');
        //Set the subject line
        $mail->Subject = 'Тема письма';
        //$mail->Body    = 'Текст письма';// - использовать, если нет $mail->msgHTML();
        $mail->msgHTML(file_get_contents('Views/mail/contents.html'), dirname(__FILE__));
        return $mail->send();
    }
} 
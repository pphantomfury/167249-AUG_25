<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Created class
class SendMail
{
    public function Send_Mail($conf, $mailCnt, $debug = false)
    {
        //Create an instance
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = $debug ? SMTP::DEBUG_SERVER : SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = $conf['smtp_host'];                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = $conf['smtp_user'];                     //SMTP username
            $mail->Password = $conf['smtp_pass'];
            $mail->SMTPSecure = $conf['smtp_secure'] === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $conf['smtp_port'];


            //Recipients
            $mail->setFrom($mailCnt['email_from'], $mailCnt['name_from']);
            $mail->addAddress($mailCnt['email_to'], $mailCnt['name_to']);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $mailCnt['subject'];
            $mail->Body = $mailCnt['body'];
            $mail->AltBody = strip_tags($mailCnt['body']);


            $mail->send();
            return 'Message has been sent';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}




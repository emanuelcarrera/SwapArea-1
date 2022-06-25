<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Emails {

    public function EnviarMail($email,$text,$asunto){



        $mail = new PHPMailer(true);
    
        try {
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'CARRERAE@itbeltran.com.ar';
            $mail->Password = 'Brujeria2';
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
        
            $mail->setFrom('CARRERAE@itbeltran.com.ar');//correo de envio
            $mail->addAddress($email, 'Receptor');// correo destino
        
            //$mail->addAttachment('docs/dashboard.png', 'Dashboard.png');
        
            $mail->isHTML(true);
            $mail->Subject = $asunto; //titulo del mail
            $mail->Body = $text;
            $mail->send();
    
            
    
        } catch (Exception $e) {
            //$response->getBody()->Write($mail->ErrorInfo); 
        }
    

            
        return $email;
    }



}

$Email = new Emails;
?>
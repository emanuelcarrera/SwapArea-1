<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class EmailController{

    public function EnviarMail($request, $response, $args){

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
            $mail->addAddress('emanueljcarrera@gmail.com', 'Receptor');// correo destino
        
            //$mail->addAttachment('docs/dashboard.png', 'Dashboard.png');
        
            $mail->isHTML(true);
            $mail->Subject = 'Prueba desde GMAIL'; //titulo del mail
            $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>.';
            $mail->send();
    
    
            $response->getBody()->Write('Correo enviado');
            
    
        } catch (Exception $e) {
            $response->getBody()->Write($mail->ErrorInfo); 
        }
    

            
        return $response ;
    }


}
?>
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
        //$mail->Username = 'CARRERAE@itbeltran.com.ar';
        //$mail->Password = 'Brujeria2';
           $mail->Username = 'swaparea@hotmail.com';
           $mail->Password = 'Emafacu22';
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
        
            $mail->setFrom('swaparea@hotmail.com');//correo de envio
            $mail->addAddress($email, 'Receptor');// correo destino
        
            //$mail->addAttachment('docs/dashboard.png', 'Dashboard.png');
        
            $mail->isHTML(true);
            $mail->Subject = $asunto; //titulo del mail
            $mail->Body = $text;
            $mail->send();
    
            
    
        } catch (Exception $e) {
            $response->getBody()->Write('dd'); 
        }
    

            
        return $email;
    }


    public function RecuperoPass($email,$token){

        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("UPDATE `usuarios` 
        SET `token` = '$token' 
        WHERE `Mail` = '$email';");
        $consulta->execute();
        $mail = new PHPMailer(true);
    
       try {
         // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        //$mail->Username = 'CARRERAE@itbeltran.com.ar';
        //$mail->Password = 'Brujeria2';
        $mail->Username = 'swaparea@hotmail.com';
        $mail->Password = 'Emafacu22';
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    
        $mail->setFrom('swaparea@hotmail.com');//correo de envio
        $mail->addAddress($email, 'Receptor');// correo destino
    
        //$mail->addAttachment('docs/dashboard.png', 'Dashboard.png');
    
        $mail->isHTML(true);
        $mail->Subject = "SwapArea Recupero de contraseña"; 
        $mail->Body    = 'Estimado usuario, recibimos su solicitud para recuperar su contraseña de acceso a SwapArea. Para recuperarla por favor ingrese al siguiente link
           http://localhost/SwapArea/SwapArea/Front/pantallas/usuarios/nuevaPass.php'.'    Su token de cambio es :'.$token;
        $mail->send();


        $response->getBody()->Write($email);
        

    } catch (Exception $e) {
        $response->getBody()->Write($mail->ErrorInfo); 
    }

   }


  public function GetValidarToken($token)
  {

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT `idUsuario` FROM `usuarios` WHERE token = '$token' ");  
    // $this->autor;idUsuario
    $consulta->execute();
    $filas = $consulta->rowCount();   
    
    
    if($filas>0)
    {
       return "1";     
    }
    else
    {
       return "0";
    }
    
  }

}

$Email = new Emails;
?>
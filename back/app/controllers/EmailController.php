<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class EmailController{


    public function RecuperoPass($request, $response, $args){


        $listaDeParametros = $request->getParsedBody();
        $email = $listaDeParametros['MAIL'];
        $token = uniqid();
        $mail= new Emails();
        $response = $mail->RecuperoPass($email,'Hola! Recibimos tu solicitud para cambiar la contraseña! 
        <br>
        Por favor ingresa el siguiente token para efectuar el cambio de la misma: '.$token.'
        <br>
        Si vos no solicitaste el cambio de contraseña, por favor desestima este mail y contactate con nosotros si lo ves necesario
        <br>
        Atte SwapArea.');
    
  
            
        return $response->withHeader('Content-Type', 'application/json');
    }


    public function GetValidarToken($request, $response, $args){


        $listaDeParametros = $request->getParsedBody();
        $token = $args['token'];
        $pass = $args['pass'];
        $mail= new Emails();
        $valid = $mail->GetValidarToken($token);

       if($valid = "1")
       {
        $usr=  new Usuarios();
        $listaDeParametros = $request->getParsedBody();
    
        $pass2 = password_hash($pass, PASSWORD_BCRYPT);;
        $usr->CambioPass($pass2,$token );
       }
         

        $response ->getBody()->Write(json_encode($valid ));
        return $response->withHeader('Content-Type', 'application/json');
    }




}
?>
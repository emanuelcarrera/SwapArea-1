<?php
require '../vendor/autoload.php';
require '..\vendor\phpmailer\phpmailer\src\PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SolicitudesControlller{

    public function CompraArticulo($request, $response, $args){

        $Soli=  new Solicitudes();

        $listaDeParametros = $request->getParsedBody();
        $Soli->id_Articulo =  $listaDeParametros['id_Artuculo'];
        $Soli->ofertante =  $listaDeParametros['ofertante'];
        $Soli->monto =  $listaDeParametros['monto'];
        $Soli->Comprar($Soli);
        $response->getBody()->Write(json_encode($Soli));

        $usu = new Usuarios();
        $usu = $usu->GetMailByAeticulo($Soli->id_Articulo);
        $mail= new Emails();
        $mail->EnviarMail( $usu[0]->Mail ,"Hola! Recibiste una nueva solicitud de intercambio!
        <br>
        Por favor ingresa a la pagina para contestarta!
        <br>
        Atte SwapArea. ","Tiene una nueva solicitud de intercambio"  );
         
        
        return $response ;
    }

    public function Aceptarsolicitud($request, $response, $args){
        $Soli=  new Solicitudes();
        $id = (int)$args['id'];

        $RESULT= $Soli->AceptarSolicitud($id);
    

        $response->getBody()->Write(json_encode($RESULT));
        
        return $response ;
    }
    public function Rechazarsolicitud($request, $response, $args){
        $Soli=  new Solicitudes();
        $listaDeParametros = $request->getParsedBody();
        $id =  $listaDeParametros['id'];

        $Soli->RechazarSolicitud($id );
        $response->getBody()->Write(json_encode($Soli));
        
        return $response ;
    }

    public function solicitudIntercambio($request, $response, $args){

        $Soli=  new Solicitudes();

        $listaDeParametros = $request->getParsedBody();
        $Soli->id_Articulo =  $listaDeParametros['id_Articulo'];
        $Soli->ofertante =  $listaDeParametros['ofertante'];
        $Soli->monto =  $listaDeParametros['monto'];
        $Soli->id_Articulo_oferta  =  $listaDeParametros['id_Articulo_oferta'];
        $Soli->comentario =  $listaDeParametros['comentario'];

        $Soli->solicitudIntercambio($Soli);
        $response->getBody()->Write(json_encode($Soli));

        $usu = new Usuarios();
        $usu = $usu->GetMailByAeticulo($Soli->id_Articulo);
        $mail= new Emails();
        $mail->EnviarMail( $usu[0]->Mail ,"Hola! Recibiste una nueva solicitud de intercambio!
        <br>
        Por favor ingresa a la pagina para contestarta!
        <br>
        Atte SwapArea. ","Tiene una nueva solicitud de intercambio" );
        
        return $response ;
    }
    public function AltaSolicitud($request, $response, $args){

        $Soli=  new Solicitudes();
        $listaDeParametros = $request->getParsedBody();
        $idArticulo = (int)$listaDeParametros['idArticulo']; 
        $ofertante = (int)$listaDeParametros['idUsuario']; 
        $oferta = (int)$listaDeParametros['idoferta']; 
        $monto = (int)$listaDeParametros['monto']; 
        $comentario = $listaDeParametros['comentario']; 
        
        $arrayUsuarios = $Soli->AltaSolicitud($idArticulo,$ofertante,$oferta,$monto,$comentario);
      
        $response ->getBody()->Write(json_encode($listaDeParametros));

        $usu = new Usuarios();
        $usu = $usu->GetMailByAeticulo($idArticulo);
        $mail= new Emails();
        $mail->EnviarMail( $usu[0]->Mail ,"Hola! Recibiste una nueva solicitud de intercambio!
        <br>
        Por favor ingresa a la pagina para contestarta!
        <br>
        Atte SwapArea. ","Tiene una nueva solicitud de intercambio"  );
       return $response->withHeader('Content-Type', 'application/json');
     }
    
    public function solicitudbyUsusario($request, $response, $args){

        $Soli=  new Solicitudes();
        $listaDeParametros = $request->getParsedBody();
        $idu =  (int)$args['IDU'];
        $Solicitudes = $Soli->getSolitudesByUser($idu);
        $response ->getBody()->Write(json_encode($Solicitudes));
      
       return $response->withHeader('Content-Type', 'application/json');
    
    }

    public function OfertasbyUsusario($request, $response, $args){

        $Soli=  new Solicitudes();
        $listaDeParametros = $request->getParsedBody();
        $idu =  (int)$args['IDU'];
        $Solicitudes = $Soli->OfertasbyUsusario($idu);
        $response ->getBody()->Write(json_encode($Solicitudes));
      
       return $response->withHeader('Content-Type', 'application/json');
    
    }

    
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
    public function vistoSolicitudes($request, $response, $args){

        $Soli=  new Solicitudes();
        $idu =  (int)$args['IDU'];
        $count = $Soli->getVistosolicitudes($idu);
        $response ->getBody()->Write(json_encode($count));
      
       return $response->withHeader('Content-Type', 'application/json');
    
    }


}

?>
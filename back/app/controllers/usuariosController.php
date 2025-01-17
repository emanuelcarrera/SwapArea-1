  
<?php

class UsuariosController{



public function Alta($request, $response, $args){

    $usr=  new Usuarios();

    $listaDeParametros = $request->getParsedBody();
    $usr->Nombre =  $listaDeParametros['Nombre'];
    $usr->Apellido =  $listaDeParametros['Apellido'];
    $usr->NombreUsuario =  $listaDeParametros['NombreUsuario'];
    $usr->Contraseña =  password_hash($listaDeParametros['Contrasenia'], PASSWORD_DEFAULT);
    $usr->Mail =  $listaDeParametros['Mail'];
    $usr->Edad =  $listaDeParametros['Edad'];
    $usr->dni =  $listaDeParametros['dni'];
    $usr->Telefono =  $listaDeParametros['Telefono'];
    $usr->CrearUsuario($usr);
    //$LisatU = $usr->Login($usr);  
    //$Email  = $usr->GetMail($LisatU[0]->idUsuario);
    
    $mail= new Emails();
    $mail->EnviarMail( $listaDeParametros['Mail'] ,"Hola! Nos da mucho gusto poder saludarte y darte la bienvenida a SwapArea!
    <br>
    Te confirmamos por este medio que se dio el alta de usuario correctamente!
    <br>
    Apurate a subir tus articulos y empezar a intercambiar!
    <br>
    Atte SwapArea.","SWAPAREA ALTA DE USUARIO" );


    $response ->getBody()->Write(json_encode( $listaDeParametros['Mail']));
    
    return $response;
}

public function Baja($request, $response, $args){

    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();
    $usr->idUsuario =  $listaDeParametros['idUsuario'];

    $usr->EliminarUsuario($usr);
    $response->getBody()->Write("Eliminado");
    return $response;
}

public function Modificacion($request, $response, $args){

    $usr=  new Usuarios();

    
    $listaDeParametros = $request->getParsedBody();
    $id =  $listaDeParametros['IdUsuario'];
    $usr->Nombre =  $listaDeParametros['Nombre'];
    $usr->Apellido =  $listaDeParametros['Apellido'];
    $usr->Edad =  $listaDeParametros['edad'];
    $usr->Telefono =  $listaDeParametros['telefono'];
    $usr->Mail =  $listaDeParametros['email'];
    $usr->UpdateUsuario($usr,$id);
    $response->getBody()->Write("Modificado");


    return $response;
}
public function Listar($request, $response, $args){

   $usr=  new Usuarios();
   $usr->idUsuario = $args['id']; 
   $arrayUsuarios = $usr->TodosLosUsaurios($usr->idUsuario);
   $response ->getBody()->Write(json_encode($arrayUsuarios));
 

  return $response->withHeader('Content-Type', 'application/json');
}

public function GetDatosUsuario($request, $response, $args){

    $usr=  new Usuarios();
    $usr->idUsuario = $args['idUsuario']; 

    $arrayUsuarios = $usr->GetDatosUsuario($usr);
    $response ->getBody()->Write(json_encode($arrayUsuarios));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }

public function Login($request, $response, $args){
     
    $usr=  new Usuarios();

    $usr->NombreUsuario = $args['nombreUsuario'];
    $usr->Contraseña =  $args['pass'];
    $Contrasenahash = $usr->ObetenerPass($usr);
    
    if(password_verify($args['pass'], $Contrasenahash))
    {
        $usr->Contraseña = "";
        $LisatU = $usr->Login($usr);  
        $response ->getBody()->Write(json_encode($LisatU));
    
    } else {
        $usr->idUsuario = "0";
        $response ->getBody()->Write(json_encode( $usr));

    }
    return $response->withHeader('Content-Type', 'application/json');

}



public function ValidadPass($request, $response, $args){
     
    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();
    $id  =  $args['id'];
    //$listaDeParametros = $request->getParsedBody();
    $usr->nombreUsuario = $args['nombreUsuario'];
    $passold = $args['passold'];
    $pass =  $args['pass'];
    

    $Contraseñahash = $usr->ObetenerPass($usr);
    
    if(password_verify($args['passold'], $Contraseñahash))
    {
        $usr->Contraseña =  password_hash($pass, PASSWORD_BCRYPT);
        $usr->UpdatePass($usr,$id);
    
        
    }

    $response ->getBody()->Write(json_encode($usr));

    return $response->withHeader('Content-Type', 'application/json');
    
}



public function GuardarFoto($request, $response, $args){


    $usr=  new Usuarios();


    $listaDeParametros = $request->getParsedBody();
    $id =  $listaDeParametros['idUsuario'];
    $img = $listaDeParametros['archivo'];
    
    //$response ->getBody()->Write(json_encode($img));
    $direccion = dirname(__DIR__) . '\fotos\\';
    $partes = explode(";base64,", $img); 
    
    $extension = explode('/', $partes[0]);
    $imagen_base64 = base64_decode($partes[1]);
    $partefinala =  uniqid() . "." . $extension[1];
    $archivo = $direccion . $partefinala; 
    $response ->getBody()->Write(json_encode($archivo));
    file_put_contents($archivo ,$imagen_base64 );

    $usr->foto =  "../../../back/app/fotos/" . $partefinala;
    $usr->GuardarFoto($usr,$id);
    $response->getBody()->Write("Creado");

    return $response ;
}

public function GetProvinvias($request, $response, $args)
{      $usr=  new Usuarios();
    
       $arrayZona = $usr->GetProvinvias();
       $response ->getBody()->Write(json_encode($arrayZona));
     
    
      return $response->withHeader('Content-Type', 'application/json');
}


public function GetCiudades($request, $response, $args)
{      $usr=  new Usuarios();
       $id  =  $args['idciudad'];
       $arrayZona = $usr->Getciudades($id);
       $response ->getBody()->Write(json_encode($arrayZona));
     
    
      return $response->withHeader('Content-Type', 'application/json');
}


public function AltaDomicilio($request, $response, $args){

    $usr=  new Usuarios();    
    $listaDeParametros = $request->getParsedBody();
    $idU = $listaDeParametros['IdUsuario'];
    $dir = $listaDeParametros['Direccion'];
    $idc = $listaDeParametros['id_ciudad'];

    $usr->AltaDomicilio($idU,$dir ,$idc);
    $response->getBody()->Write("Modificado");


    return $response;
}


public function getDomicilio($request, $response, $args)
{      
       $usr=  new Usuarios();
       $id  =  $args['id'];
       $arrayZona = $usr->getDomicilio($id);
       $response ->getBody()->Write(json_encode($arrayZona));
     
    
      return $response->withHeader('Content-Type', 'application/json');
}


 public function CompraMoneda($request, $response, $args){

    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();

    $idU = $listaDeParametros['idU'];
    $cantidad = $listaDeParametros['cantidad'];
    $usr->CompraMoneda($idU,$cantidad);
     
    $Email  = $usr->GetMail($idU);
    $mail= new Emails();
    $mail->EnviarMail( $Email[0]->Mail ,"Hola! Te confirmamos que se hizo la compra de moneda correctamente!
    <br>
    Para revisar tu saldo ingresa al monedero.
    <br>
    Atte SwapArea.","Carga de saldo swaparea" );

    $response ->getBody()->Write(json_encode($listaDeParametros));
    return $response->withHeader('Content-Type', 'application/json');
 }

public function getHistorialMoneda($request, $response, $args)
 {
    $usr=  new Usuarios();
    $id =  $args['idU'];
    $historial = $usr->getHistorialMoneda($id);
    $response ->getBody()->Write(json_encode($historial));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }
 
 public function getmontoMoneda($request, $response, $args)
 {
    $usr=  new Usuarios();
    $id =  $args['idU'];
    $historial = $usr->getmontoMoneda($id);
    $response ->getBody()->Write(json_encode($historial));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }
 public function GetUsuariosbyName($request, $response, $args)
 {
    $usr=  new Usuarios();
    $Nombre =  $args['nombre'];
    $id =  $args['id'];
    $Usuarios = $usr->GetUsuariosbyName($Nombre,$id);
    $response ->getBody()->Write(json_encode($Usuarios));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }

 public function CambioPass($request, $response, $args){

    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();

    $pass = $listaDeParametros['pass'];
    $usr->CambioPass($pass);
     

    return $response->withHeader('Content-Type', 'application/json');
 }

 public function ValidarNombreMail($request, $response, $args){

    $usr=  new Usuarios();

    $listaDeParametros = $request->getParsedBody();
    
    $nombre = $listaDeParametros['nombre']; 
    $mail = $listaDeParametros['mail'];

    $usr->NombreUsuario = $usr->ValidarNombreUusario($nombre);
    $usr->Mail = $usr->ValidarMail($mail);
    $response ->getBody()->Write(json_encode($usr));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }


 public function MailContacto($request, $response, $args){

    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();
    $idU = $listaDeParametros['Mail'];
    $Mensaje = $listaDeParametros['mensaje'];
    $asunto = $listaDeParametros['asunto'];
     
    $mail= new Emails();
    $mail->EnviarMail( 'emanueljcarrera@gmail.com', $asunto , $idU."   ".$Mensaje );
    $response ->getBody()->Write(json_encode($Mensaje ));
    return $response->withHeader('Content-Type', 'application/json');
 }

 public function getTokenMoneda($request, $response, $args)
 {
    $usr=  new Usuarios();
    $id =  $args['id'];
    $Token = $usr->getTokenMoneda($id);
    $response ->getBody()->Write(json_encode($Token));
  
   return $response->withHeader('Content-Type', 'application/json');
 }

 public function SetTokenMoneda($request, $response, $args)
 {
    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();
    $id = $listaDeParametros['id']; 
    $Token = uniqid();
    $usr->SetTokenMoneda($id,$Token);
    $Email  = $usr->GetMail($id);
    $mail= new Emails();
    $mail->EnviarMail( $Email[0]->Mail ,"Hola! Recibimos tu solicitud para retirar saldo de tu cuenta! 
    <br>
    Por favor ingresa el siguiente token para finalizar con el retiro :  ".$Token."
    <br>
    Atte SwapArea.","SWAPAREA Token de validacion" );

    $response ->getBody()->Write(json_encode("OK"));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }

 public function RetiroSaldo($request, $response, $args)
 {
    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();
    $id = $listaDeParametros['id']; 
    $saldo = $listaDeParametros['saldo']; 
    $Token = uniqid();
    $usr->RetiroSaldo($id,$saldo);
    $Email  = $usr->GetMail($id);
    $mail= new Emails();
    $mail->EnviarMail( $Email[0]->Mail ,"Se retiro : ". $saldo . "  de su saldo." ,"SWAPAREA Retiro de saldo" );

    $response ->getBody()->Write(json_encode("OK"));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }


}


?>
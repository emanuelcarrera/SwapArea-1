  
<?php

class UsuariosController{



public function Alta($request, $response, $args){

    $usr=  new Usuarios();

    $listaDeParametros = $request->getParsedBody();
    $usr->Nombre =  $listaDeParametros['Nombre'];
    $usr->Apellido =  $listaDeParametros['Apellido'];
    $usr->NombreUsuario =  $listaDeParametros['NombreUsuario'];
    $usr->Contraseña =  password_hash($listaDeParametros['Contrasenia'], PASSWORD_BCRYPT);
    $usr->Mail =  $listaDeParametros['Mail'];
    $usr->Edad =  $listaDeParametros['Edad'];
    $usr->dni =  $listaDeParametros['dni'];
    $usr->Telefono =  $listaDeParametros['Telefono'];
    $usr->CrearUsuario($usr);
    $response->getBody()->Write("Usuario Creado");
    
    return $response ;
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
   $arrayUsuarios = $usr->TodosLosUsaurios();
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



    //$listaDeParametros = $request->getParsedBody();

    $usr->nombreUsuario = $args['nombreUsuario'];

    $usr->Contraseña =  $args['pass'];

       

    $Contraseñahash = $usr->ObetenerPass($usr);

   



    if(password_verify($args['pass'], $Contraseñahash))

    {

        $usr->Contraseña = "";

        $LisatU = $usr->Login($usr);  

        //$response->getBody()->Write($id);

        $response ->getBody()->Write(json_encode($LisatU));

       

    }

    else

    {



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

public function AltaSolicitud($request, $response, $args){

    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();
    $idArticulo = $listaDeParametros['idArticulo']; 
    $dueno = $listaDeParametros['idDueno']; 
    $ofertante = $listaDeParametros['idUsuario']; 
    $oferta = $listaDeParametros['idoferta']; 
    $monto = $listaDeParametros['monto']; 
    $comentario = $listaDeParametros['comentario']; 
    
    $arrayUsuarios = $usr->AltaSolicitud($idArticulo,$dueno,$ofertante,$oferta,$monto,$comentario);
  
    $response ->getBody()->Write(json_encode($listaDeParametros));
   return $response->withHeader('Content-Type', 'application/json');
 }

 public function CompraMoneda($request, $response, $args){

    $usr=  new Usuarios();
    $listaDeParametros = $request->getParsedBody();

    $idU = $listaDeParametros['idU'];
    $cantidad = $listaDeParametros['cantidad'];
    $usr->CompraMoneda($idU,$cantidad);
     
    $response ->getBody()->Write(json_encode($listaDeParametros));
    return $response->withHeader('Content-Type', 'application/json');
 }



}


?>
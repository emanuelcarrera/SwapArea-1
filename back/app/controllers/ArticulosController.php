<?php

class ArticulosController{

public function GuardarImagen($request, $response, $args){

    $listaDeParametros = $request->getParsedBody();
    $img = $listaDeParametros['archivo'];
    
    //$response ->getBody()->Write(json_encode($img));
    $direccion = dirname(__DIR__) . '\fotos\\';
    $partes = explode(";base64,", $img); 
    
    //$response ->getBody()->Write(json_encode($partes));
    $extension = explode('/', $partes[0]);
    $imagen_base64 = base64_decode($partes[1]);
    $archivo = $direccion . uniqid() . "." . $extension[1];
    $response ->getBody()->Write(json_encode($archivo));
    file_put_contents($archivo ,$imagen_base64 );

    return $response ;

}

public function Alta($request, $response, $args){


    $Art=  new Articulos();


    $listaDeParametros = $request->getParsedBody();
    $img = $listaDeParametros['archivo'];
    
    //$response ->getBody()->Write(json_encode($img));
    $direccion = dirname(__DIR__) . '\fotos\\';
    $partes = explode(";base64,", $img); 
    
    //$response ->getBody()->Write(json_encode($partes));
    $extension = explode('/', $partes[0]);
    $imagen_base64 = base64_decode($partes[1]);
    $archivo = $direccion . uniqid() . "." . $extension[1];
    $response ->getBody()->Write(json_encode($archivo));
    file_put_contents($archivo ,$imagen_base64 );


    $Art->idUsuario =  $listaDeParametros['idUsuario'];
    $Art->Nombre =  $listaDeParametros['Nombre'];
    $Art->Descripcion =  $listaDeParametros['Descripcion'];
    $Art->foto =  json_encode($archivo);
    $Art->Valor =  $listaDeParametros['Valor'];
    $Art->Clasificacion =  $listaDeParametros['Clasificacion'];
    $Art->CrearArticulo($Art);
    $response->getBody()->Write("Creado");

    return $response ;
}

public function Baja($request, $response, $args){

    $Art=  new Articulos();
    $listaDeParametros = $request->getParsedBody();
    $Art->idArticulo =  $listaDeParametros['idArticulo'];

    $Art->EliminarArticulo($Art);
    $response->getBody()->Write("Eliminado");
    return $response;
}

public function Modificacion($request, $response, $args){

    $Art=  new Articulos();



    $listaDeParametros = $request->getParsedBody();
    $Art->idArticulo =  $listaDeParametros['idArticulo'];
    $Art->Nombre =  $listaDeParametros['Nombre'];
    $Art->Descripcion =  $listaDeParametros['Descripcion'];
    $Art->foto =  $listaDeParametros['foto'];
    $Art->Valor =  $listaDeParametros['Valor'];
    $Art->Clasificacion =  $listaDeParametros['Clasificacion'];
    $Art->UpdateArticulo($Art);
    $response->getBody()->Write("Modificado");

    

    return $response;
}
public function Listar($request, $response, $args){

   $Art=  new Articulos();
   $arrayUsuarios = $usr->TodosLosUsaurios();
   $response ->getBody()->Write(json_encode($arrayUsuarios));
 

  return $response->withHeader('Content-Type', 'application/json');
}




}


?>
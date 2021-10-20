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
    $archivo = '..\..\..\back\app\fotos\\' . uniqid() . "." . $extension[1];
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
    $partefinala =  uniqid() . "." . $extension[1];
    $archivo = $direccion . $partefinala;

    
    $response ->getBody()->Write(json_encode($archivo));
    file_put_contents($archivo ,$imagen_base64 );


    $Art->idUsuario =  $listaDeParametros['idUsuario'];
    $Art->Nombre =  $listaDeParametros['Nombre'];
    $Art->Descripcion =  $listaDeParametros['Descripcion'];
    $Art->foto =  "../../../back/app/fotos/" . $partefinala;
    $Art->Valor =  $listaDeParametros['Valor'];
    $Art->Clasificacion =  $listaDeParametros['Clasificacion'];
    $Art->CrearArticulo($Art);
    $response->getBody()->Write("Creado");

    return $response ;
}

public function Baja($request, $response, $args){

    $Art=  new Articulos();
    $listaDeParametros = $request->getParsedBody();
    //$Art->idArticulo =  (int)$listaDeParametros['idArticulo'];
    $idA =  (int)$listaDeParametros['idArticulo'];
    $Art->EliminarArticulo($idA);
    $response->getBody()->Write("Eliminado");
    return $response;
}

public function Modificacion($request, $response, $args){

    $Art=  new Articulos();

    $listaDeParametros = $request->getParsedBody();
    $Art->idArticulo =  $listaDeParametros['idArticulo'];
    $Art->Nombre =  $listaDeParametros['Nombre'];
    $Art->Descripcion =  $listaDeParametros['Descripcion'];
    $Art->Valor =  $listaDeParametros['Valor'];
    $Art->Clasificacion =  $listaDeParametros['Clasificacion'];
    $Art->UpdateArticulo($Art);
    $response->getBody()->Write("Modificado");

    

    return $response;
}
public function ListarAusuario($request, $response, $args){

   $Art=  new Articulos();
   $listaDeParametros = $request->getParsedBody();
   $idUsuario =  (int)$args['IDU'];
   $arrayUsuarios = $Art->ListarAUsuario($idUsuario);
   $response ->getBody()->Write(json_encode($arrayUsuarios));
 

  return $response->withHeader('Content-Type', 'application/json');
}

public function Buscar($request, $response, $args){

    $Art=  new Articulos();
    $Busca =  $args['Busca'];
    $arrayUsuarios = $Art->Buscar($Busca);
    $response ->getBody()->Write(json_encode($arrayUsuarios));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }


 public function TodosLosArticulos($request, $response, $args){

    $Art=  new Articulos();
    $arrayUsuarios = $Art->TodosLosArticulos();
    $response ->getBody()->Write(json_encode($arrayUsuarios));
  
 
   return $response->withHeader('Content-Type', 'application/json');
 }


public function GetArticulo($request, $response, $args){

    $Art=  new Articulos();
    $listaDeParametros = $request->getParsedBody();
    $idA =  (int)$args['IDA'];
    $Articulo = $Art->GetArticulo($idA );
    $response ->getBody()->Write(json_encode($Articulo));
  
   return $response->withHeader('Content-Type', 'application/json');
 }
 




}


?>
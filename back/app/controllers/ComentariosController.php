<?php

class ComentariosControlller{

    public function Comentar($request, $response, $args){

        $comet=  new Comentarios();

        $listaDeParametros = $request->getParsedBody();
        $comet->idUsuario =  $listaDeParametros['idUsuario'];
        $comet->Texto =  $listaDeParametros['Texto'];
        $comet->idArticulo =  $listaDeParametros['idArticulo'];
        $comet->Comentar($comet);
        $response->getBody()->Write(date("d-m-y h:i:s"));
        
        return $response ;
    }

    public function getComentariosByArticulo($request, $response, $args){

        $Com=  new Comentarios();
        $listaDeParametros = $request->getParsedBody();
        $idA =  (int)$args['IDA'];
        $Comentarios = $Com->getComentariosByArticulo($idA);
        $response ->getBody()->Write(json_encode($Comentarios));
      
       return $response->withHeader('Content-Type', 'application/json');
    
     }
}

?>
<?php

class SolicitudesControlller{

    public function CompraArticulo($request, $response, $args){

        $Soli=  new Solicitudes();

        $listaDeParametros = $request->getParsedBody();
        $Soli->id_Articulo =  $listaDeParametros['id_Artuculo'];
        $Soli->ofertante =  $listaDeParametros['ofertante'];
        $Soli->monto =  $listaDeParametros['monto'];
        $Soli->Comprar($Soli);
        $response->getBody()->Write(json_encode($Soli));
        
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

    


}

?>
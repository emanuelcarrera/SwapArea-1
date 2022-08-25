<?php

class ChatControlller{

    public function Chatear($request, $response, $args){

        $comet=  new Chat();

        $listaDeParametros = $request->getParsedBody();
        $comet->idChat = (int)$listaDeParametros['idChat'];
        $comet->Texto =  $listaDeParametros['Texto'];
        $comet->idUsuario =  $listaDeParametros['idU'];
        ///$comet->idUsuario2 =  $listaDeParametros['idUsuario2'];
        $comet->Chatear($comet->idChat ,$comet);
        $response->getBody()->Write(date($comet->idChat));
        
        return $response ;
    }

    public function getChat($request, $response, $args){

        $Com=  new Chat();
        $listaDeParametros = $request->getParsedBody();
        $idA =  (int)$args['IDA'];
        $Comentarios = $Com->getChat($idA);
        $response ->getBody()->Write(json_encode($Comentarios));
      
       return $response->withHeader('Content-Type', 'application/json');
    
    }

    public function getIdChat($request, $response, $args){

        $Com=  new Chat();
        $listaDeParametros = $request->getParsedBody();
        $idA =  (int)$args['IDA'];
        $idA2 =  (int)$args['IDA2'];
        $Com = $Com->getIdChat($idA,$idA2);
        
        if($Com[0]->id_um == null)
        {
           $Com3 = new Chat();
           $Com3->createIdChat($idA,$idA2);
           $Com =$Com3->getIdChat($idA,$idA2);
        }
        else{
             $Com2=  new Chat();
             $idum = $Com[0]->id_um;
             $Com2->Visar($idA,$idum);
        }

        $response ->getBody()->Write(json_encode($Com[0]->id_um));
      
       return $response->withHeader('Content-Type', 'application/json');
    
    }



    public function GetUsuariosChats($request, $response, $args){

        $usr=  new Usuarios();
        $usr->idUsuario = $args['idUsuario']; 
    
        $arrayUsuarios = $usr->GetUsuariosChats($usr->idUsuario);
        $response ->getBody()->Write(json_encode($arrayUsuarios));
      
     
       return $response->withHeader('Content-Type', 'application/json');
     }

     public function GetVistos($request, $response, $args){

       
        $idu = $args['idUsuario']; 
        $Com=  new Chat();
        $arrayUsuarios = $Com->getVisto($idu);
        $response ->getBody()->Write(json_encode($arrayUsuarios));
         
       return $response->withHeader('Content-Type', 'application/json');
     }


}

?>
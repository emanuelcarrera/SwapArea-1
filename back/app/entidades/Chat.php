<?php

class Chat {
    public $idChat; 
    public $idUsuario; 
    public $idUsuario2; 
    public $Fecha; 
    public $Texto; 
    public $id_um;



    public function Chatear($id,$comet)
    {
      $dtz = new DateTimeZone("America/Argentina/Buenos_Aires");
      $dt = new DateTime("now", $dtz);

      //Stores time as "2021-04-04T13:35:48":
      $currentTime = $dt->format("Y-m-d") . "T" . $dt->format("H:i:s");

      //Stores time as "2021-04-04T01:35:20":
      $currentTime = $dt->format("Y-m-d") . "T" . $dt->format("h:i:s");
      //$date = date("d-m-y h:i:s");
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      if($id > 0 ){
      $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `mensaje` (`Mensaje`, `FechaMensaje`, `id_um`,`id_usuario`) 
            VALUES ('$comet->Texto',now(),$comet->idChat,$comet->idUsuario);    
      "); 
      }
      //else{
      //  $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `usuariosmensajes`(`id_Usuario`, `id_Usuario2`)
      //  VALUES ($comet->idUsuario,$comet->idUsuario2);
      
      // select @NEWID;
      // SET @NEWID = (SELECT id_um FROM `usuariosmensajes` 
      // WHERE ($comet->idUsuario = id_usuario and $comet->idUsuario2 = id_Usuario2));
       
      //  INSERT INTO `mensaje`( `Mensaje`, `FechaMensaje`, `id_um`)      
     //  VALUES      ('$comet->Texto',DATE('$date'),@NEWID);");
     // }
      $consulta->execute();
      return $consulta->fetchAll();

    }


    public function getChat($id)
    {

      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("SELECT * FROM `mensaje` WHERE id_um = $id ");
    
      $consulta->execute();
  
      return $consulta->fetchAll();

    }

    public function getIdChat($id,$id2)
    {
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("SELECT id_um FROM `usuariosmensajes` 
      WHERE ($id = id_usuario and $id2 = id_Usuario2) or ($id2 = id_usuario and $id = id_Usuario2)");
    
      $consulta->execute();
      $filas = $consulta->rowCount();     
      if($filas>0)
      {
        return $consulta->fetchAll(PDO::FETCH_CLASS,'Chat');
      }else{
         
        $C=  new Chat();
        $a = array($C);
        return $a;

      }


    }


    public function Visar($id,$idum)
    {
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("UPDATE `mensaje` SET `Visto`= 1 
      WHERE id_um = $idum
      and id_usuario <> $id");
    
      $consulta->execute();
      return $consulta->fetchAll();

    }

    public function createIdChat($id,$id2)
    {

      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `usuariosmensajes`(`id_Usuario`, `id_Usuario2`)
      VALUES ($id,$id2)");
    
      $consulta->execute();
      return $consulta->fetchAll();

    }

    public function getVisto($idU)
    {

      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("SELECT COUNT(*) as visto FROM usuariosmensajes as um
      join Mensaje as m on um.id_um = m.id_um
      WHERE (um.id_Usuario = $idU or um.id_Usuario2 = $idU) and m.id_usuario <> $idU and Visto is null");
    
      $consulta->execute();
      return $consulta->fetchAll();

    }


    

}

$Chat = new Chat;
?>
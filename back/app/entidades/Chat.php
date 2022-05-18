<?php

class Chat {
    public $idChat; 
    public $idUsuario; 
    public $idUsuario2; 
    public $Fecha; 
    public $Texto; 



    public function Chatear($id,$comet)
    {
      $date = date("d-m-y h:i:s");
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      if($id > 0 ){
      $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `mensaje` (`Mensaje`, `FechaMensaje`, `id_um`,`id_usuario`) 
            VALUES ('$comet->Texto',CAST('$date' AS DATETIME),$comet->idChat,$comet->idUsuario);    
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



    

}

$Chat = new Chat;
?>
<?php

class Comentarios {
    public $idComentario; 
    public $idUsuario; 
    public $idArticulo; 
    public $Fecha; 
    public $Texto; 



    public function Comentar($comet)
    {
      $date = date("d-m-y h:i:s");
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `comentarios` (`id_articulo`, `id_usuario`, `texto`,`fecha`) 
      VALUES ($comet->idArticulo ,$comet->idUsuario,'$comet->Texto','$date');"); 
      $consulta->execute();
      return $consulta->fetchAll();

    }


    public function getComentariosByArticulo($idArticulo)
    {

      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("select com.* , usu.NombreUsuario
       FROM `comentarios` as com 
      join usuarios as usu 
      on com.id_usuario = usu.idUsuario
       where `id_articulo` = $idArticulo ");
    
      $consulta->execute();
  
      return $consulta->fetchAll();

    }

}

$Copmentario = new Comentarios;
?>
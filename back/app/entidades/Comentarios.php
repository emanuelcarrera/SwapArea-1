<?php

class Comentarios {
    public $idComentario; 
    public $idUsuario; 
    public $idArticulo; 
    public $Fecha; 
    public $Texto; 



    public function Comentar($comet)
    {
      $dtz = new DateTimeZone("America/Argentina/Buenos_Aires");
      $dt = new DateTime("now", $dtz);

      //Stores time as "2021-04-04T13:35:48":
      $currentTime = $dt->format("Y-m-d") . "T" . $dt->format("H:i:s");

      //Stores time as "2021-04-04T01:35:20":
      $currentTime = $dt->format("Y-m-d") . "T" . $dt->format("h:i:s");
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `comentarios` (`id_articulo`, `id_usuario`, `texto`,`fecha`) 
      VALUES ($comet->idArticulo ,$comet->idUsuario,'$comet->Texto',now());"); 
      $consulta->execute();
      return $consulta->fetchAll();

    }


    public function getComentariosByArticulo($idArticulo)
    {

      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("select com.* , usu.NombreUsuario, usu.foto , usu.idUsuario as idU
       FROM `comentarios` as com 
      join usuarios as usu 
      on com.id_usuario = usu.idUsuario
       where `id_articulo` = $idArticulo order by com.id_Comnetario desc ");
    
      $consulta->execute();
  
      return $consulta->fetchAll();

    }

}

$Copmentario = new Comentarios;
?>
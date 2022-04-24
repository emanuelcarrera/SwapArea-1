<?php

class Solicitudes {
    public $id_Solicitud; 
    public $id_Artuculo; 
    public $dueno; 
    public $ofertante; 
    public $id_Articulo_oferta; 
    public $monto;
    public $comentario;
    public $estado;
    public $RESULT;



    public function Comprar($Soli)
    {
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `solicitudes`
      (`id_Artuculo`, `dueno`, `ofertante`, `monto`,`estado`) 
      VALUES ($Soli->id_Artuculo ,(select idUsuario from `articulo` where `idArticulo` = $Soli->id_Artuculo),$Soli->ofertante,$Soli->monto,0);"); 
      $consulta->execute();
      return $consulta->fetchAll();



    }
    public function AceptarSolicitud($id)
    {
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("CALL AceptarSolicitud ($id)"); 
      $consulta->execute();
      return $consulta->fetchAll();

    }

    public function RechazarSolicitud($id)
    {
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("UPDATE `solicitudes` SET `estado`= 2
      WHERE id_Solicitud = $id;"); 
      $consulta->execute();
      return $consulta->fetchAll();
      
    }


    public function solicitudIntercambio($Soli)
    {
      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("      INSERT INTO `solicitudes`
      ( `id_Artuculo`, `dueno`, `ofertante`, `id_Articulo_oferta`, `monto`, `comentario`,`estado`) 
      VALUES ($Soli->id_Artuculo,
      (select idUsuario from `articulo` where `idArticulo` = $Soli->id_Artuculo),
      $Soli->ofertante,
      $Soli->id_Articulo_oferta,
      $Soli->monto,
      $Soli->comentario,
      0)"); 
      $consulta->execute();
      return $consulta->fetchAll();

    }


    public function getSolitudesByUser($idusuario)
    {

      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("SELECT       
       soli .*,
       art1.idArticulo AS ID_ART, 
       ART1.Nombre AS NOMBRE_ARt,
       ART1.foto AS FOTO_ART_,
       ART1.Valor AS VALOR_ART,
       art2.idArticulo AS ID_ART_OFERTA, 
       ART2.Nombre AS NOMBRE_ART_OFERTA,
       ART2.foto AS FOTO_ART_OFERTA,
       ART2.Valor AS VALOR_ART_OFERTA ,
       usu.NombreUsuario,
       usu.Nombre,
       usu.Apellido,
       usu.Mail,
       usu.Telefono,
       usu.foto  FROM 
      `solicitudes` as soli 
       join articulo as art1 on soli.id_Artuculo = art1.idArticulo 
       left join articulo as art2 on soli.id_Articulo_oferta = art2.idArticulo
       left join usuarios as usu on soli.dueno = usu.idUsuario
       where soli.ofertante = $idusuario ");
    
      $consulta->execute();
  
      return $consulta->fetchAll();

    }

    public function OfertasbyUsusario($idusuario)
    {

      $objAccesoDatos = AccesoDatos::obtenerInstancia();
      $consulta = $objAccesoDatos->prepararConsulta("SELECT 
       soli .*,
       art1.idArticulo AS ID_ART, 
       ART1.Nombre AS NOMBRE_ARt,
       ART1.foto AS FOTO_ART_,
       ART1.Valor AS VALOR_ART,
       art2.idArticulo AS ID_ART_OFERTA, 
       ART2.Nombre AS NOMBRE_ART_OFERTA,
       ART2.foto AS FOTO_ART_OFERTA,
       ART2.Valor AS VALOR_ART_OFERTA ,
       usu.NombreUsuario,
       usu.Nombre,
       usu.Apellido,
       usu.Mail,
       usu.Telefono,
       usu.foto 
       FROM 
       `solicitudes` as soli 
       join articulo as art1 on soli.id_Artuculo = art1.idArticulo 
       left join articulo as art2 on soli.id_Articulo_oferta = art2.idArticulo
       left join usuarios as usu on soli.ofertante = usu.idUsuario
       where soli.dueno = $idusuario ");
    
      $consulta->execute();
  
      return $consulta->fetchAll();

    }

}

$Copmentario = new Comentarios;
?>
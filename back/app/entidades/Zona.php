<?php
class Zona {
    public $id;
    public $nombre; 


public function GetProvinvias()
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select id_Provincia as id, nombreProvincia as nombre FROM `provincias`");
  
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS,'Zona');
}
}

$Zona = new Zona;
?>
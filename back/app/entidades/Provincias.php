<?php
class Provincias {
    public $id;
    public $Nombre;

    public function GetProvinvias()
    {
    
    
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("select id_Provincia as id, nombreProvincia as nombre FROM `provincias`");
      
        $consulta->execute();
    
        return $consulta->fetchAll(PDO::FETCH_CLASS,'Zona');
    }
  



}




$provincias = new Provincias;
?>
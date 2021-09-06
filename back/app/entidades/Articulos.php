<?php
class Articulos {
    public $idArticulo;
    public $idUsuario;
    public $Nombre;
    public $Descripcion;
    public $foto;
    public $Valor;
    public $Calificacion;
    public $Clasificacion;


    
public function CrearArticulo($art)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `articulo` (`idUsuario`,`Nombre`,`Descripcion`,`foto`,`Valor`,`Clasificacion`) VALUES ( $art->idUsuario, '$art->Nombre', '$art->Descripcion','$art->foto','$art->Valor','$art->Clasificacion');"); 
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Articulos');
}


public function UpdateArticulo($art)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `articulo` 
    SET `Nombre`='$art->Nombre',
    `Descripcion`='$art->Descripcion',
    `foto`='$art->foto',
    `Valor`='$art->Valor',
    `Clasificacion`='$art->Clasificacion'
    WHERE `idArticulo` = $art->idArticulo");
    
  
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Articulos');
}
   
public function TodosLosArticulos()
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select * from `articulo`");
    
   
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS,'Articulos');
}

    
public function EliminarArticulo($art)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("DELETE FROM `articulo` WHERE `idArticulo` = $art->idArticulo  ");
  
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Articulos');
}




}




$artuculo = new Articulos;
?>
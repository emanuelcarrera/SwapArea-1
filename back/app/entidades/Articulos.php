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
    public $Usuario;
    public $Usuariofoto;


    
public function CrearArticulo($art)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `articulo` (`idUsuario`,`Nombre`,`Descripcion`,`foto`,`Valor`,`idCategoria`) VALUES ( $art->idUsuario, '$art->Nombre', '$art->Descripcion','$art->foto','$art->Valor','$art->Clasificacion');"); 
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Articulos');
}
public function CrearArticuloAngular($art)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `articulo` (`idUsuario`,`Nombre`,`Descripcion`,`Valor`,`Clasificacion`) VALUES ( $art->idUsuario, '$art->Nombre', '$art->Descripcion','$art->Valor','$art->Clasificacion');"); 
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Articulos');
}
public function UpdateAngular($art)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `articulo` 
    SET `Nombre`='$art->Nombre',
    `Descripcion`='$art->Descripcion',
    `Valor`='$art->Valor'
    WHERE `idArticulo` = $art->idArticulo");
    
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Articulos');
}
   


public function UpdateArticulo($art)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `articulo` 
    SET `Nombre`='$art->Nombre',
    `Descripcion`='$art->Descripcion',
    `Valor`='$art->Valor',
    `idCategoria`='$art->Clasificacion'
    WHERE `idArticulo` = $art->idArticulo");
    
  
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Articulos');
}
   
public function TodosLosArticulos()
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select a.idArticulo,a.idUsuario,a.Nombre,a.Descripcion,a.foto,a.Valor ,b.Descripcion as Clasificacion 
    FROM `articulo` as a join categorias as b on b.idCategoria = a.idCategoria ");
    
   
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS,'Articulos');
}


public function Buscar($Busca)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select a.idArticulo,a.idUsuario,a.Nombre,a.Descripcion,a.foto,a.Valor ,b.Descripcion as Clasificacion 
    FROM `articulo` as a join categorias as b on b.idCategoria = a.idCategoria
     where a.`Nombre` like '%$Busca%' or  a.`Descripcion` like '%$Busca%'");
    
   
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS,'Articulos');
}

public function ListarAUsuario($idUsuario)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select a.idArticulo,a.idUsuario,a.Nombre,a.Descripcion,a.foto,a.Valor ,b.Descripcion as Clasificacion 
    FROM `articulo` as a join categorias as b on b.idCategoria = a.idCategoria WHERE `idUsuario` = $idUsuario");
      
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS,'Articulos');
}

public function GetArticulo($idA)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT a.`idArticulo`,a.`idUsuario`,a.`Nombre`,
    a.`Descripcion`,a.`foto`,a.`Valor`,a.`Calificacion`,a.`idCategoria`,
    u.NombreUsuario as Usuario, u.foto as Usuariofoto
    FROM `articulo` as a
    join usuarios as u on a.idUsuario = u.idUsuario WHERE a.`idArticulo` = $idA");
  
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS,'Articulos');
}

    
public function EliminarArticulo($idA)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("DELETE FROM `articulo` WHERE `idArticulo` = $idA");
  
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Articulos');
}


public function GetCategorias()
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT idCategoria,Descripcion FROM `categorias` ");
  
    $consulta->execute();

    return $consulta->fetchAll();
}



}




$artuculo = new Articulos;
?>
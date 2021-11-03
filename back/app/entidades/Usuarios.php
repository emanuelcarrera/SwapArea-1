<?php

class Usuarios {

    public $idUsuario; 
    public $Nombre; 
    public $Apellido; 
    public $NombreUsuario; 
    public $Contraseña; 
    public $Calificacion; 
    public $Mail; 
    public $Edad; 
    public $dni; 
    public $foto; 
    public $Telefono; 
    public $Moneda; 
    public $id_tx; 
    public $id_Domicilio;


    
public function CrearUsuario($usr)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO 
    `usuarios`( `Nombre`, `Apellido`, `NombreUsuario`, `Contraseña`,`Mail`, `Edad`, `dni`, `Telefono`)
     VALUES ('$usr->Nombre','$usr->Apellido','$usr->NombreUsuario','$usr->Contraseña','$usr->Mail',$usr->Edad,$usr->dni,$usr->Telefono);
     ");
  
    $consulta->execute();

    $consulta = $objAccesoDatos->prepararConsulta("
    SELECT @SomeVariable;
    set  @SomeVariable = (select `idUsuario` from `usuarios` where `NombreUsuario` = '$usr->NombreUsuario');
    INSERT INTO `monedero` (`idUsuario`, `Monto`) VALUES (@SomeVariable,0);  ");
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}


public function UpdateUsuario($usr, $id)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `usuarios` 
    SET `nombre` = '$usr->Nombre' ,
    `Apellido` = '$usr->Apellido',
    `edad` = $usr->Edad,
    `Mail` =  '$usr->Mail',
    `Telefono` =  '$usr->Telefono' 
    WHERE `idUsuario` = $id");
    
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}


public function GetDatosUsuario($usr)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT * from `usuarios`  WHERE `idUsuario` = $usr->idUsuario");
   
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}
   
public function TodosLosUsaurios()
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT * from `usuarios`");
    
    // $this->autor;
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios');
}

    
public function EliminarUsuario($usr)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("DELETE FROM `usuarios` WHERE `idUsuario` = $usr->idUsuario  ");
    
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}

public function ObetenerPass($usr)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT `Contraseña` FROM `usuarios` WHERE `nombreUsuario` = '$usr->nombreUsuario' ");
    
    // $this->autor;
    $consulta->execute();
    $filas = $consulta->rowCount(); 
     
    if($filas>0)
    {

       $usu = $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');

       return strval($usu[0]->Contraseña);
    }
    else
    {

    return "0";
    }
    
}

public function Login($usr)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT `idUsuario` FROM `usuarios` WHERE `nombreUsuario` = '$usr->nombreUsuario' ");  
    // $this->autor;idUsuario
    $consulta->execute();
    $filas = $consulta->rowCount();     
    if($filas>0)
    {
       return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
       //return strval($usu[0]->Contraseña);
       
    }
    else
    {
       return "0";
    }
    
}
public function UpdatePass($usr,$id)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `usuarios` 
    SET `Contraseña` = '$usr->Contraseña' 
    WHERE `idUsuario` = $id;");
    $usr->Nombre = $consulta;
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}

public function GuardarFoto($usr,$id)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `usuarios` 
    SET `foto` = '$usr->foto' 
    WHERE `idUsuario` = $id ");
    
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}

public function GetProvinvias()
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select id_Provincia as id, nombreProvincia as nombre FROM `provincias`");
  
    $consulta->execute();

    return $consulta->fetchAll();
}

public function Getciudades($id)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select id_ciudad as id, nombreCiuadad as nombre FROM `ciudades` where `id_Provincia`= $id ");
  
    $consulta->execute();

    return $consulta->fetchAll();
}


public function AltaDomicilio($idU,$dir ,$idc)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `domicilios`( `Direccion`, `id_ciudad`, `idUsuario`) VALUES ('$dir', $idc,$idU )");
  
    $consulta->execute();

    return $consulta->fetchAll();
}

public function getDomicilio($id)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT dom.Direccion,dom.id_ciudad,ciu.id_Provincia,ciu.nombreCiuadad, pro.nombreProvincia FROM `domicilios` as dom 
    join `ciudades` as ciu on dom.id_ciudad = ciu.id_ciudad
    join `provincias` as pro on ciu.id_Provincia = pro.id_Provincia
    where dom.idUsuario = $id");
  
    $consulta->execute();

    return $consulta->fetchAll();
}


public function AltaSolicitud($idArticulo,$dueno,$ofertante,$oferta,$monto,$comentario)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `solicitudes` (`id_Artuculo`, `dueno`, `ofertante`, `id_Articulo_oferta`, `monto`, `comentario`) 
    VALUES ($idArticulo,$dueno,$ofertante,$oferta,$monto,'$comentario');"); 
    $consulta->execute();

    $consulta = $objAccesoDatos->prepararConsulta("SELECT * FROM `solicitudes` WHERE 1");
    $consulta->execute();
    return $consulta->fetchAll();

}

public function CompraMoneda($idU, $cantidad)
{ 
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `monedero` 
    SET `Monto` =  `Monto` +  $cantidad
    WHERE `idUsuario` = $idU ");


    $consulta->execute();

    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `historialmoneda`(`idUsuario`, `monto`, `fecha`) 
    VALUES ($idU,$cantidad, now())");

    $consulta->execute();
    return $consulta->fetchAll();
}

public function  getHistorialMoneda($idU)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select * FROM `historialmoneda` where `idUsuario`= $idU ");
  
    $consulta->execute();

    return $consulta->fetchAll();
}

public function  getmontoMoneda($idU)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select * FROM `monedero` where `idUsuario`= $idU ");
  
    $consulta->execute();

    return $consulta->fetchAll();
}


}





$usuarios = new Usuarios;
?>
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
    public $id_Monedero; 
    public $id_tx; 
    public $id_Domicilio;

    
public function CrearUsuario($usr)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `usuarios`( `Nombre`, `Apellido`, `NombreUsuario`, `Contraseña`,`Mail`, `Edad`, `dni`, `Telefono`) VALUES ('$usr->Nombre','$usr->Apellido','$usr->NombreUsuario','$usr->Contraseña','$usr->Mail',$usr->Edad,$usr->dni,$usr->Telefono)");
  
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


}





$usuarios = new Usuarios;
?>
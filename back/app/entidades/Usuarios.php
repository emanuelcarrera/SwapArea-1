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

public function AltaAngular($usr)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `usuarios`( `NombreUsuario`, `Contraseña`,`Mail`)
     VALUES ('$usr->Nombre','$usr->Contraseña','$usr->Mail'); ");
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
   
public function TodosLosUsaurios($id)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT usu.NombreUsuario, usu.foto, usu.idUsuario,
     (Select m.Mensaje from usuariosmensajes as um 
    left join Mensaje as m 
    on um.id_um = m.id_um 
     where ($id = um.id_usuario and usu.idUsuario = um.id_Usuario2) 
     or (usu.idUsuario = um.id_usuario and $id = um.id_Usuario2) ORDER by m.id_Mensaje desc  LIMIT 1) as M,
     (Select m.FechaMensaje from usuariosmensajes as um 
    left join Mensaje as m 
    on um.id_um = m.id_um 
     where ($id = um.id_usuario and usu.idUsuario = um.id_Usuario2) 
     or (usu.idUsuario = um.id_usuario and $id = um.id_Usuario2) ORDER by m.id_Mensaje desc  LIMIT 1) as FechaMensaje,
     (Select m.id_usuario from usuariosmensajes as um 
    left join Mensaje as m 
    on um.id_um = m.id_um 
     where ($id = um.id_usuario and usu.idUsuario = um.id_Usuario2) 
     or (usu.idUsuario = um.id_usuario and $id = um.id_Usuario2) ORDER by m.id_Mensaje desc  LIMIT 1) as emisor,
     (Select COUNT(*) from usuariosmensajes as um 
    left join Mensaje as m 
    on um.id_um = m.id_um 
     where (($id = um.id_usuario and usu.idUsuario = um.id_Usuario2) 
     or (usu.idUsuario = um.id_usuario and $id= um.id_Usuario2)) and (m.id_usuario = usu.idUsuario and m.Visto is null) ) as visto
    from `usuarios` as usu");
    

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
    $consulta = $objAccesoDatos->prepararConsulta("SELECT `Contraseña` FROM `usuarios` WHERE `NombreUsuario` = '$usr->NombreUsuario' ");
    
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
    $consulta = $objAccesoDatos->prepararConsulta("SELECT `idUsuario` FROM `usuarios` WHERE `NombreUsuario` = '$usr->NombreUsuario' ");  
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




public function CompraMoneda($idU, $cantidad)
{ 
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `monedero` 
    SET `Monto` =  `Monto` +  $cantidad
    WHERE `idUsuario` = $idU ");
      $dtz = new DateTimeZone("America/Argentina/Buenos_Aires");
      $dt = new DateTime("now", $dtz);

      //Stores time as "2021-04-04T13:35:48":
      $currentTime = $dt->format("Y-m-d") . "T" . $dt->format("Hh:i:s");

      //Stores time as "2021-04-04T01:35:20":
      $currentTime = $dt->format("Y-m-d") . "T" . $dt->format("hh:i:s");

    $consulta->execute();

    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `historialmoneda`(`idUsuario`, `monto`, `fecha`) 
    VALUES ($idU,$cantidad, now() )");

    $consulta->execute();
    return $consulta->fetchAll();
}

public function  getHistorialMoneda($idU)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select * FROM `historialmoneda` where `idUsuario`= $idU order by fecha desc");
  
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
public function ValidarNombre($Nombre)
{


    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select COUNT(*) as valid from `usuarios`  WHERE `NombreUsuario` = '$Nombre'");
  
    $consulta->execute();

    return $consulta->fetchAll();
}


public function GetUsuariosChats($usr)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT * 
      from `usuarios` 
      WHERE `idUsuario` in (select id_Usuario2 FROM `usuariosmensajes` 
      WHERE ($usr = id_usuario )) or `idUsuario` in (select  id_usuario FROM `usuariosmensajes` 
      WHERE ($usr = id_Usuario2))");
   
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}


public function GetUsuariosbyName($nombre,$id)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT usu.NombreUsuario, usu.foto, usu.idUsuario,
    (Select m.Mensaje from usuariosmensajes as um 
     left join Mensaje as m 
     on um.id_um = m.id_um 
    where ($id = um.id_usuario and usu.idUsuario = um.id_Usuario2) 
    or (usu.idUsuario = um.id_usuario and $id = um.id_Usuario2) ORDER by m.id_Mensaje desc  LIMIT 1) as M,
    (Select m.FechaMensaje from usuariosmensajes as um 
    left join Mensaje as m 
    on um.id_um = m.id_um 
    where ($id = um.id_usuario and usu.idUsuario = um.id_Usuario2) 
    or (usu.idUsuario = um.id_usuario and $id = um.id_Usuario2) ORDER by m.id_Mensaje desc  LIMIT 1) as FechaMensaje,
    (Select m.id_usuario from usuariosmensajes as um 
    left join Mensaje as m 
    on um.id_um = m.id_um 
    where ($id = um.id_usuario and usu.idUsuario = um.id_Usuario2) 
    or (usu.idUsuario = um.id_usuario and $id = um.id_Usuario2) ORDER by m.id_Mensaje desc  LIMIT 1) as emisor,
    (Select COUNT(*) from usuariosmensajes as um 
    left join Mensaje as m 
    on um.id_um = m.id_um 
    where (($id = um.id_usuario and usu.idUsuario = um.id_Usuario2) 
    or (usu.idUsuario = um.id_usuario and $id= um.id_Usuario2)) and (m.id_usuario = usu.idUsuario and m.Visto is null) ) as visto 
    from `usuarios` as usu
    WHERE usu.Nombre like '%$nombre%' ");
   
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}

public function GetMail($id)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT `Mail` FROM `usuarios` where `idUsuario` = $id ");

    $consulta->execute();
 
    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}


public function CambioPass($pass,$token)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `usuarios` 
    SET `Contraseña` = '$pass' 
    WHERE token = '$token';");

    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}


public function ValidarNombreUusario($nombre)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT NombreUsuario
    FROM `usuarios` where `NombreUsuario` = '$nombre'  ");

    $consulta->execute();

    $filas = $consulta->rowCount();     
    if($filas>0)
    {
       return "1";
       
    }
    else
    {
       return "0";
    }
 
}

public function ValidarMail($mail)
{

    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("SELECT `Mail`
    FROM `usuarios` where  `Mail`= '$mail' ");
   $consulta->execute();
    $filas = $consulta->rowCount();     
    if($filas>0)
   {
      return "1";
   
    }
     else
    {
           return "0";
    }
}


public function GetMailByAeticulo($id)
{

  $objAccesoDatos = AccesoDatos::obtenerInstancia();
  $consulta = $objAccesoDatos->prepararConsulta("SELECT  u.Mail FROM articulo a 
  join usuarios u on a.idUsuario = u.idUsuario
  WHERE A.idArticulo = $id ");

  $consulta->execute();

  return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuarios');
}

public function  getTokenMoneda($idU)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("select Token FROM `monedero` where `idUsuario`= $idU ");
  
    $consulta->execute();

    return $consulta->fetchAll();
}

public function  SetTokenMoneda($idU,$Token)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `monedero` SET `Token`='$Token' 
    WHERE `idUsuario` = $idU");
  
    $consulta->execute();

    return $consulta->fetchAll();
}

public function  RetiroSaldo($idU,$saldo)
{
    $objAccesoDatos = AccesoDatos::obtenerInstancia();
    $consulta = $objAccesoDatos->prepararConsulta("UPDATE `monedero` 
    SET `Monto` =  `Monto` -  $saldo
    WHERE `idUsuario` = $idU ");
      $dtz = new DateTimeZone("America/Argentina/Buenos_Aires");
      $dt = new DateTime("now", $dtz);

      //Stores time as "2021-04-04T13:35:48":
      $currentTime = $dt->format("Y-m-d") . "T" . $dt->format("Hh:i:s");

      //Stores time as "2021-04-04T01:35:20":
      $currentTime = $dt->format("Y-m-d") . "T" . $dt->format("hh:i:s");

    $consulta->execute();

    $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `historialmoneda`(`idUsuario`, `monto`, `fecha`) 
    VALUES ($idU,-$saldo, now() )");

    $consulta->execute();
    return $consulta->fetchAll();

}
}





$usuarios = new Usuarios;
?>
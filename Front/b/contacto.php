
<?php
require "funciones.php";
require "head.php";
require "header.php";
?>  

<main>
    

<br>
<br>
<br>
<br>
<a class="boton_personalizado" href="contactos.php">Volver</a>
<style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 300;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }

</style>

<br>
<br>
<br>
<br>
</main>



 <?php 

//Evitar el acceso directo
if($_POST==null) exit();

//Funcion que formatea el mensaje de error en formato json y sale del script
function Error($msj){
    echo '{"status": "0", "msj": "'.$msj.'"}';
    exit;
}
    
//Funcion para validar los datos
function ValDato($dato){
    $dato = trim($dato);//Eliminar espacion a los lados
    $dato = strip_tags($dato);//Eliminar etiquetas HTML
    $dato = addslashes($dato); // **** usar "stripcslashes" para restaurar valores *** 
    return $dato;
}
    
//Recolectando valores de POST
//Verificar que los valores existan y validarlos
if(isset($_POST['name']))
    $name = ValDato($_POST['name']);
else
    Error('Error');
    
if(isset($_POST['mail']))
    $mail = ValDato($_POST['mail']);
else
    Error('Error');
    
if(isset($_POST['msj']))
    $msj = ValDato($_POST['msj']);
else
    Error('Error');


// Validando los datos  
//Verificando el numero minimo de caracteres
if(strlen($name)<5) 
    Error('El nombre debe de tener al menos 5 caracteres ');
    
//Se utiliza la funcion filter_var para validar el correo
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) 
    Error('El correo no es valido.');

if(strlen($msj)<5) 
    Error('Se necesitan mas detalles para el mensaje.');    
   
//Mensaje de respuesta en formato json
echo '{"status": "1", "msj": "ok"}';
 ?>



<?php
require "footer.php";
?>


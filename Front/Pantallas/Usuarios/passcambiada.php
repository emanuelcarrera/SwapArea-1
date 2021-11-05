<?php
require "../head.php";
require "../header.php";
require("connection.php");
?>  
<br>
<br>

<div class="col-md-6">
  <h5>La contraseña se cambio correectamente por favor volve a iniciar sesion</h5>
  
  <input  class="btn btn-primary" type="button" value="Ir al login" onClick=" window.location.href='login.php' ">
</div>

<?php 
$mailLaboral = $_POST["mailLaboral"]; 
$nuevaPass = $_POST["Pass"];

$pasHash =  password_hash($nuevaPass, PASSWORD_DEFAULT);

$sqlvaluser = ("UPDATE usuarios SET Contraseña ='$pasHash' WHERE Mail = '$mailLaboral'");

$result = $conexion->query($sqlvaluser);
 ?>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
<?php 
require "../footer.php";
 ?>
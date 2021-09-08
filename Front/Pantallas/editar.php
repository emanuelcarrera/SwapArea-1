<?php
require "funciones.php";

if (!isset($_POST["guardar"])) {
   if (isset($_POST["articulos-id"]) && !empty($_POST["articulos-id"])) {
      $where = " WHERE id = '" . $_POST['articulos-id'] . "'";
      $articulos = miQuery("SELECT * FROM articulos $where");
      $articulos = $articulos[0];
   } else {
      $where = "";
      $articulos["nombre"]      = "";
      $articulos["foto"]        = "";
      $articulos["descripcion"] = "";
      $articulos["valor"] = "";
      $articulos["calificacion"] = "";
      $articulos["clasificacion"] = "";
     
   }
} else {

   if (isset($_POST["articulos-id"]) && !empty($_POST["articulos-id"])) {

      
            
     if(isset($_GET['id'])) {
        $id=$_GET['id'];
        $consulta="SELECT * FROM articulos WHERE id='$id';";
        
        $sentencia = $pdo->prepare($consulta);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

    }

    $id=$_POST['articulos-id'];
   $nombre=$_POST['nombre'];
   $valor=$_POST['valor'];
   $calificacion=$_POST['calificacion'];
   $clasificacion=$_POST['clasificacion'];
   $foto=$_POST['foto'];
   $descripcion=$_POST['descripcion'];
   $sentencia=0;

   $sql = "UPDATE articulos SET nombre='$nombre',valor='$valor',calificacion='$calificacion',clasificacion='$clasificacion',foto='$foto',descripcion='$descripcion' WHERE id='$id'";

   $sentencia = $pdo->prepare($sql);
   $sentencia->execute();

   if($sentencia==1){
   header("location:articulos.php");
}
      

   } else {
   	  

      $articulos["nombre"]      = $_POST["nombre"];
      $articulos["valor"]        = $_POST["valor"];
      $articulos["calificacion"] = $_POST["calificacion"];
      $articulos["clasificacion"] = $_POST["clasificacion"];
      $articulos["foto"] = $_POST["foto"];
      $articulos["descripcion"] = $_POST["descripcion"];
      

      $errores = FALSE;
      if (empty($articulos["nombre"])) {
         $errores .= "El nombre del articulo no puede estar vacío.<br>";
      }
      if (empty($articulos["descripcion"])) {
         $errores .= "La descripción de la articulos no puede estar vacía.<br>";
      }
      if (empty($articulos["foto"])) {
         $errores .= "Los articulos deben tener una foto.<br>";
      }/*
      if (empty($articulos["calificacion"])) {
         $errores .= "El nombre de la articulos no puede estar vacío.<br>";
      }*/
      if (empty($articulos["clasificacion"])) {
         $errores .= "Los articulos deben tener una clasificacion.<br>";
      }
      if (empty($articulos["valor"])) {
         $errores .= "Los articulos deben tener un valor.<br>";
      }
      

      if (!$errores) {
         $db  = conectar();
         $articulos = mysqli_query($db,"INSERT INTO articulos (id, nombre, descripcion, foto, calificacion, clasificacion, valor) VALUES (null, '" . $articulos['nombre'] . "', '" . $articulos['descripcion'] . "', '" . $articulos['foto'] . "', '" . $articulos['calificacion'] . "','" . $articulos['clasificacion'] . "', '" . $articulos['valor'] . "' )");
         
         if ($articulos) {
            header("location:articulos.php?alta=1");
            exit;
         } else {
            $errores .= "Error al intentar guardar el articulo en la base de datos.";
         }
      }

   }

}

?>

<?php
require "head.php";
require "header.php";
?>	

<?php if (isset($errores) && !empty($errores)): ?>
<script>
   toastr.error('<?php echo $errores ?>', 'Error en el Producto');
</script>  
<?php endif; ?>

<main role="main">

   <div class="album py-5 bg-light">
      <div class="container">
         <br><br>
         <?php if ($_SESSION["log"]): ?>
            <div class="col-md-6 offset-md-3">
            <h2><i class="fa fa-gift"></i> Alta/Edición de articulos</h2>
            <hr>
            <br>
            <form method="POST" action="#" enctype="multipart/form-data">
                  <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" focus class="form-control" name="nombre" id="nombre" value="<?php echo $articulos['nombre']; ?>" placeholder="Ingrese el titulo...">
                  </div>
                  
                  <div class="form-group">
                        <label for="foto">foto:</label>
                        <input type="text" focus class="form-control" name="foto" id="foto" placeholder="la foto">
                  </div>
                  <?php if (!empty($articulos["foto"])): ?>
                     <img src="<?php echo $articulos['foto']; ?>" width="400px">
                  <?php endif; ?>
                  

                  	<div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" focus class="form-control" name="valor" id="valor" value="<?php echo $articulos['valor']; ?>" placeholder="Ingrese el genero...">
                  </div>
                  <div class="form-group">
                        <label for="clasificacion">clasificacion:</label>
                        <input type="text" focus class="form-control" name="clasificacion" id="clasificacion" value="<?php echo $articulos['clasificacion']; ?>" placeholder="Ingrese la clasificacion ...">
                  </div>
                  <div class="form-group">
                        <label for="calificacion">calificacion:</label>
                        <input type="text" focus class="form-control" name="calificacion" id="calificacion" value="<?php echo $articulos['calificacion']; ?>" placeholder="Ingrese la calificacion...">
                  </div>
                  
                  <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea type="text" focus class="form-control" name="descripcion" id="descripcion" value="<?php echo $articulos['descripcion']; ?>" placeholder="Ingrese una descripción..."></textarea>
                  </div>

                  
                  <div class="text-right">
                     <br>
                     <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                     <a href="articulos.php" class="btn btn-primary"><i class="fa fa-reply"></i> Volver</a>
                     <?php if (isset($_POST["articulos-id"]) && !empty($_POST["articulos-id"])): ?>
                        <input type="hidden" name="articulos-id" value="<?php echo $_POST["articulos-id"] ?>">
                     <?php endif ?>
                     <input type="hidden" name="guardar" value="1">
                    
                  </div>

                  
            </form> 
            <br><br>
            </div>
         <?php else: ?>
            <?php header("location:articulos.php"); exit; ?>
         <?php endif; ?>
 
      </div>
   </div>
</main>


<?php
require "footer.php";
?>
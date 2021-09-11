<?php
require "funciones.php";

if (!isset($_POST["guardar"])) {
   if (isset($_POST["movies-id"]) && !empty($_POST["movies-id"])) {
      $where = " WHERE id = '" . $_POST['movies-id'] . "'";
      $movies = miQuery("SELECT * FROM movies $where");
      $movies = $movies[0];
   } else {
      $where = "";
      $movies["titulo"]      = "";
      $movies["linkImagen"]        = "";
      $movies["descripcion"] = "";
      $movies["genero"] = "";
      $movies["duracion"] = "";
      $movies["puntaje"] = "";
      $movies["anio"] = "";
   }
} else {

   if (isset($_POST["movies-id"]) && !empty($_POST["movies-id"])) {

      
            
     if(isset($_GET['id'])) {
        $id=$_GET['id'];
        $consulta="SELECT * FROM movies WHERE id='$id';";
        
        $sentencia = $pdo->prepare($consulta);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

    }

    $id=$_POST['movies-id'];
   $titulo=$_POST['titulo'];
   $anio=$_POST['anio'];
   $puntaje=$_POST['puntaje'];
   $duracion=$_POST['duracion'];
   $genero=$_POST['genero'];
   $descripcion=$_POST['descripcion'];
   $linkImagen=$_POST['linkImagen'];
   $sentencia=0;

   $sql = "UPDATE movies SET titulo='$titulo',anio='$anio',puntaje='$puntaje',duracion='$duracion',genero='$genero',descripcion='$descripcion',linkImagen='$linkImagen' WHERE id='$id'";

   $sentencia = $pdo->prepare($sql);
   $sentencia->execute();

   if($sentencia==1){
   header("location:peliculas.php");
}
      

   } else {
   	  

      $movies["titulo"]      = $_POST["titulo"];
      $movies["linkImagen"]        = $_POST["linkImagen"];
      $movies["descripcion"] = $_POST["descripcion"];
      $movies["genero"] = $_POST["genero"];
      $movies["duracion"] = $_POST["duracion"];
      $movies["puntaje"] = $_POST["puntaje"];
      $movies["anio"] = $_POST["anio"];

      $errores = FALSE;
      if (empty($movies["titulo"])) {
         $errores .= "El nombre de la movies no puede estar vacío.<br>";
      }
      if (empty($movies["descripcion"])) {
         $errores .= "La descripción de la movies no puede estar vacía.<br>";
      }
      if (empty($movies["linkImagen"])) {
         $errores .= "La movies debe tener una imagen relacionada.<br>";
      }
      if (empty($movies["genero"])) {
         $errores .= "El nombre de la movies no puede estar vacío.<br>";
      }
      if (empty($movies["duracion"])) {
         $errores .= "La descripción de la movies no puede estar vacía.<br>";
      }
      if (empty($movies["puntaje"])) {
         $errores .= "La movies debe tener una imagen relacionada.<br>";
      }
      if (empty($movies["anio"])) {
         $errores .= "La movies debe tener una imagen relacionada.<br>";
      }

      if (!$errores) {
         $db  = conectar();
         $movies = mysqli_query($db,"INSERT INTO movies (id, titulo, descripcion, linkImagen, genero, duracion, puntaje, anio) VALUES (null, '" . $movies['titulo'] . "', '" . $movies['descripcion'] . "', '" . $movies['linkImagen'] . "', '" . $movies['genero'] . "','" . $movies['duracion'] . "', '" . $movies['puntaje'] . "', '" . $movies['anio'] . "' )");
         
         if ($movies) {
            header("location:peliculas.php?alta=1");
            exit;
         } else {
            $errores .= "Error al intentar guardar la pelicula en la base de datos.";
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
            <h2><i class="fa fa-gift"></i> Alta/Edición de movies</h2>
            <hr>
            <br>
            <form method="POST" action="#" enctype="multipart/form-data">
                  <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" focus class="form-control" name="titulo" id="titulo" value="<?php echo $movies['titulo']; ?>" placeholder="Ingrese el titulo...">
                  </div>
                  
                  <div class="form-group">
                        <label for="imagen">Link Imagen:</label>
                        <input type="text" focus class="form-control" name="linkImagen" id="linkImagen" placeholder="Ingrese el link de la imagen...">
                  </div>
                  <?php if (!empty($movies["linkImagen"])): ?>
                     <img src="<?php echo $movies['linkImagen']; ?>" width="400px">
                  <?php endif; ?>
                  

                  	<div class="form-group">
                        <label for="genero">Genero:</label>
                        <input type="text" focus class="form-control" name="genero" id="genero" value="<?php echo $movies['genero']; ?>" placeholder="Ingrese el genero...">
                  </div>
                  <div class="form-group">
                        <label for="duracion">Duracion:</label>
                        <input type="text" focus class="form-control" name="duracion" id="duracion" value="<?php echo $movies['duracion']; ?>" placeholder="Ingrese la duracio ...">
                  </div>
                  <div class="form-group">
                        <label for="puntaje">Puntaje:</label>
                        <input type="text" focus class="form-control" name="puntaje" id="puntaje" value="<?php echo $movies['puntaje']; ?>" placeholder="Ingrese el puntaje...">
                  </div>
                  <div class="form-group">
                        <label for="anio">Año:</label>
                        <input type="text" focus class="form-control" name="anio" id="anio" value="<?php echo $movies['anio']; ?>" placeholder="Ingrese el año...">
                  </div>
                  <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea type="text" focus class="form-control" name="descripcion" id="descripcion" value="<?php echo $movies['descripcion']; ?>" placeholder="Ingrese una descripción..."></textarea>
                  </div>

                  
                  <div class="text-right">
                     <br>
                     <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                     <a href="peliculas.php" class="btn btn-primary"><i class="fa fa-reply"></i> Volver</a>
                     <?php if (isset($_POST["movies-id"]) && !empty($_POST["movies-id"])): ?>
                        <input type="hidden" name="movies-id" value="<?php echo $_POST["movies-id"] ?>">
                     <?php endif ?>
                     <input type="hidden" name="guardar" value="1">
                    
                  </div>

                  
            </form> 
            <br><br>
            </div>
         <?php else: ?>
            <?php header("location:peliculas.php"); exit; ?>
         <?php endif; ?>
 
      </div>
   </div>
</main>


<?php
require "footer.php";
?>
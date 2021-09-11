<?php
require "funciones.php";

if (!isset($_POST["borrar"])) {
   if (isset($_POST["movies-id"])) {
      $where = " WHERE id = '" . $_POST['movies-id'] . "'";
      $movies = miQuery("SELECT * FROM movies $where");
      $movies = $movies[0];
   } else {
      header("location:peliculas.php");
      exit;
   }
} else {
   if (isset($_POST["movies-id"])) {
      $movies = miQuery("DELETE FROM movies WHERE id = '" . $_POST['movies-id'] . "'");
      header("location:peliculas.php?borrar=" . $_POST['movies-id']);
      exit;
   } else {
      header("location:peliculas.php");
      exit;
   }
}

?>

<?php
require "head.php";
require "header.php";
?> 

<main role="main">

   <div class="album py-5 bg-light">
      <div class="container">
         <br><br>
         <?php if ($_SESSION["log"]): ?>
            <div class="col-md-6 offset-md-3">
            <h2><i class="fa fa-gift"></i> Eliminar Pelicula</h2>
            <hr>
            <br>
               <div class="card mb-4 shadow-sm">
                  <img src="<?php echo $movies["linkImagen"] ?>" height="300px">
                  <div class="card-body">
                     <h3><?php echo $movies["titulo"] ?></h3>
                     <p class="card-text"><?php echo $movies["descripcion"] ?></p>
                     <?php if ($_SESSION["log"]): ?>
                        <div class="text-right">
                           <p>¿Seguro quiere borrar esta pelicula?</p>
                           <form class="form-inline" method="POST" action="borrar.php">
                               <a href="peliculas.php" class="btn btn-primary"><i class="fa fa-reply"></i> Volver</a>
                              <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                              <input type="hidden" name="movies-id" value="<?php echo $movies["id"] ?>">
                              <input type="hidden" name="borrar" value="1">
                           </form>
                        </div>
                     <?php endif; ?>
                  </div>
               </div>
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
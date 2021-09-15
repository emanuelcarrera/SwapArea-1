

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
            <h2><i class="fa fa-gift"></i> Eliminar articulos</h2>
            <hr>
            <br>
               <div class="card mb-4 shadow-sm">
                  <img src="<?php echo $articulos["foto"] ?>" height="300px">
                  <div class="card-body">
                     <h3><?php echo $articulos["nombre"] ?></h3>
                     <p class="card-text"><?php echo $articulos["descripcion"] ?></p>
                     <?php if ($_SESSION["log"]): ?>
                        <div class="text-right">
                           <p>¿Seguro quiere borrar este articulo?</p>
                           <form class="form-inline" method="POST" action="borrar.php">
                               <a href="articulos.php" class="btn btn-primary"><i class="fa fa-reply"></i> Volver</a>
                              <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                              <input type="hidden" name="articulo-id" value="<?php echo $articulos["id"] ?>">
                              <input type="hidden" name="borrar" value="1">
                           </form>
                        </div>
                     <?php endif; ?>
                  </div>
               </div>
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
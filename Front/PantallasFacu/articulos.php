<?php
require "head.php";
require "header.php";
?>	

<?php if (isset($_GET["borrar"])): ?>
<script>
   toastr.success('El articulo #<?php echo $_GET["borrar"] ?> fue eliminado con éxito...', 'articulo eliminado');
</script>  
<?php endif; ?>
<?php if (isset($_GET["alta"])): ?>
<script>
   toastr.success('Se creo correctamente el articulo', 'Articulo creado');
</script>  
<?php endif; ?>
<main role="main">

   <div class="album py-5 bg-light">
      <div class="container">
         <?php if ($_SESSION["log"]): ?>
            <form class="form-inline" method="POST" action="editar.php">
               <button type="submit" class="btn btn btn-success"><i class="fa fa-plus"></i> Nuevo articulo</button>
               <input type="hidden" name="articulos-id" value="">
            </form>
            <br><br>
         <?php endif; ?>
         <div class="row">
            <?php if (!empty($articulos)): ?>
               <?php for ($i=0; $i < count($articulos); $i++): ?>
                  <div class="col-md-4">
                     <div class="card mb-4 shadow-sm">
                        <img src="<?php echo $articulos[$i]["foto"] ?>" height="230px">
                        <div class="card-body">
                           <h3><?php echo $articulos[$i]["nombre"] ?></h3>
                           <p class="card-text">Descripcion: <?php echo $articulos[$i]["descripcion"] ?></p>
                           <p class="card-text">Valor: <?php echo $articulos[$i]["valor"] ?></p>
                           <p class="card-text">calificacion: <?php echo $articulos[$i]["calificacion"] ?></p>
                           <p class="card-text">Clasificacion: <?php echo $articulos[$i]["clasificacion"] ?></p>
                           
                           <?php if ($_SESSION["log"]): ?>
                              <div class="text-right">
                                 <form class="form-inline" method="POST" action="editar.php">
                                    <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</button>
                                    <input type="hidden" name="articulos-id" value="<?php echo $articulos[$i]["id"] ?>">
                                 </form>
                                 <form class="form-inline" method="POST" action="borrar.php">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                                    <input type="hidden" name="articulos-id" value="<?php echo $articulos[$i]["id"] ?>">
                                 </form>
                              </div>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               <?php endfor; ?>
            <?php else: ?>
               <h4 class="noexisten"><i class="fa fa-warning"></i> No existe articulos para mostrar.</h4>
            <?php endif; ?>

         </div>
      </div>
   </div>
</main>


<?php
require "footer.php";
?>
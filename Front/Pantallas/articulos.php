<?php
require "funciones.php";
$articulos = miQuery("SELECT * FROM articulos");

?>

<?php 

//open connection to mysql db
$connection = mysqli_connect("127.0.0.1","root","","primerparcial") or die("Error " . mysqli_error($connection));

$sql = "select * from articulos";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));



    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
      

       $id=$_POST['articulos-id'];
       $nombre=$_POST['nombre'];
       $valor=$_POST['valor'];
       $calificacion=$_POST['calificacion'];
       $clasificacion=$_POST['clasificacion'];
       $foto=$_POST['foto'];
       $descripcion=$_POST['descripcion'];
   

      $articulos[] = array('id'=> $id, 'nombre'=> $nombre,  'valor'=> $valor, 'calificacion'=> $calificacion,
                        'descripcion'=> $descripcion, 'clasificacion'=> $clasificacion, 'foto'=> $foto);

    }

    
    $json_string = json_encode($articulos);
    $file = 'articulos.json';
    file_put_contents($file, $json_string);

    
     
      


 ?>

<?php
$datos_articulos = file_get_contents("articulos.json");
$json_articulos = json_decode($datos_articulos, true);

foreach ($json_articulos as $jarticulos) {
    
  //  echo $jarticulos."<br>";
}


?>

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
                           <p class="card-text">Puntaje: <?php echo $articulos[$i]["puntaje"] ?></p>
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
<?php
require "funciones.php";
$movies = miQuery("SELECT * FROM movies");

?>

<?php 

//open connection to mysql db
$connection = mysqli_connect("127.0.0.1","root","","primerparcial") or die("Error " . mysqli_error($connection));

$sql = "select * from movies";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));



    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
      

      $id=$row['id'];
      $titulo=$row['titulo'];
      $genero=$row['genero'];
      $duracion=$row['duracion'];
      $descripcion=$row['descripcion'];
      $puntaje=$row['puntaje'];
      $linkImagen=$row['linkImagen'];
      $anio=$row['anio'];

      $peliculas[] = array('id'=> $id, 'titulo'=> $titulo,  'genero'=> $genero, 'duracion'=> $duracion,
                        'descripcion'=> $descripcion, 'puntaje'=> $puntaje, 'linkImagen'=> $linkImagen, 'anio'=>$anio);

    }

    
    $json_string = json_encode($peliculas);
    $file = 'peliculas.json';
    file_put_contents($file, $json_string);

    
     
      


 ?>

<?php
$datos_movies = file_get_contents("peliculas.json");
$json_movies = json_decode($datos_movies, true);

foreach ($json_movies as $jpeliculas) {
    
  //  echo $jpeliculas."<br>";
}


?>

<?php
require "head.php";
require "header.php";
?>	

<?php if (isset($_GET["borrar"])): ?>
<script>
   toastr.success('La pelicula #<?php echo $_GET["borrar"] ?> fue eliminado con éxito...', 'pelicula eliminada');
</script>  
<?php endif; ?>
<?php if (isset($_GET["alta"])): ?>
<script>
   toastr.success('la pelicula fue ingresada con éxito...', 'pelicula agregada');
</script>  
<?php endif; ?>
<main role="main">

   <div class="album py-5 bg-light">
      <div class="container">
         <?php if ($_SESSION["log"]): ?>
            <form class="form-inline" method="POST" action="editar.php">
               <button type="submit" class="btn btn btn-success"><i class="fa fa-plus"></i> Nueva pelicula</button>
               <input type="hidden" name="movies-id" value="">
            </form>
            <br><br>
         <?php endif; ?>
         <div class="row">
            <?php if (!empty($peliculas)): ?>
               <?php for ($i=0; $i < count($peliculas); $i++): ?>
                  <div class="col-md-4">
                     <div class="card mb-4 shadow-sm">
                        <img src="<?php echo $movies[$i]["linkImagen"] ?>" height="230px">
                        <div class="card-body">
                           <h3><?php echo $movies[$i]["titulo"] ?></h3>
                           <p class="card-text">Descripcion: <?php echo $movies[$i]["descripcion"] ?></p>
                           <p class="card-text">Año: <?php echo $movies[$i]["anio"] ?></p>
                           <p class="card-text">Duracion: <?php echo $movies[$i]["duracion"] ?></p>
                           <p class="card-text">Genero: <?php echo $movies[$i]["genero"] ?></p>
                           <p class="card-text">Puntaje: <?php echo $movies[$i]["puntaje"] ?></p>
                           <?php if ($_SESSION["log"]): ?>
                              <div class="text-right">
                                 <form class="form-inline" method="POST" action="editar.php">
                                    <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</button>
                                    <input type="hidden" name="movies-id" value="<?php echo $movies[$i]["id"] ?>">
                                 </form>
                                 <form class="form-inline" method="POST" action="borrar.php">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                                    <input type="hidden" name="movies-id" value="<?php echo $movies[$i]["id"] ?>">
                                 </form>
                              </div>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               <?php endfor; ?>
            <?php else: ?>
               <h4 class="noexisten"><i class="fa fa-warning"></i> No existe movies para mostrar.</h4>
            <?php endif; ?>

         </div>
      </div>
   </div>
</main>


<?php
require "footer.php";
?>
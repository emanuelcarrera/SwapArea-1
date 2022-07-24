
<?php
require "../head.php";
require "../header.php";
?>	

<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<body>
</br>
</br>


    <div >
    <div class="row">
    <div class="col-md-4">
      </div>  
    <div class="col-md-4">
    <div id="fotos"> 
    </div>  
    </div>  

</diV>
	<div class="form-group">
    

    </DIV>	
    <div class="row">
    <div class="col-md-4">
      </div>  
    <div class="col-md-4">
      
    <input type="file" id="archivo" class="form-control" >
      <button  id="btnSubirFoto"  class="form-control" type="submit" onclick="subir_imagenes()"> Subir foto</button>
      </div>
      </div>


      <div class="row">
        <div class="col-md-4">
      </div>       


      <div class="col-md-4 border border-dark rounded">
            
	  <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" focus class="form-control" name="nombre" id="nombre"  placeholder="Ingrese el titulo...">
                  </div>
                  

                  	<div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" focus class="form-control" name="valor" id="valor"  placeholder="Ingrese el genero...">
                  </div>
                  <div class="form-group">
                  <label for="clasificacion">Categoria:</label>
                        <select class="custom-select form-control" id="Categorias">
                        </select>
                  </div>
                  
                  <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea type="text" focus class="form-control" name="descripcion" id="descripcion"  placeholder="Ingrese una descripción..."></textarea>
                  </div>
				  <div class="form-group">
				  <input type="button" id="btnEnviar"   onclick="Modificar()" value="Aceptar" class="btn btn-primary" />
				  </div>





                        </div>

                        </div>
             
  

</div>
                 



                  </body>
</html>
<script type="text/javascript">
// Call carousel manually
$('#myCarouselCustom').carousel();

// Go to the previous item
$("#prevBtn").click(function(){
    $("#myCarouselCustom").carousel("prev");
});
// Go to the previous item
$("#nextBtn").click(function(){
    $("#myCarouselCustom").carousel("next");
});
</script>
<script src="../..\js/EditarArticulo.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<?php
require "../head.php";
require "../header.php";
?>	




</br>
</br>

</diV>
<div class="row">	
      <div class="col-md-4">
      </div>	
    <div class="col-md-4 border border-dark rounded">
      <br>
	<div class="form-group " >
      <input type="file" id="archivo" name="archivo" accept=".jpg, .jpeg, .png" multiple="" class="form-control">

    </div>	

	  <div class="form-group">
                        <label for="nombre">Nombre articulo:</label>
                        <input type="text" focus class="form-control" name="nombre" id="nombre"  placeholder="Ingrese el titulo...">
                  </div>
                  

                  	<div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" focus class="form-control" name="valor" id="valor"  placeholder="Ingrese el genero...">
                  </div>
                  <div class="form-group">
                        <label for="clasificacion">Categoria articulo:</label>
                        <select class="custom-select form-control" id="Categorias">
                        </select>
                  </div>
                  
                  <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea type="text" focus class="form-control" name="descripcion" id="descripcion"  placeholder="Ingrese una descripción..."></textarea>
                  </div>
				  <div class="form-group">
				  <input type="button" id="btnEnviar" value="Aceptar" class="btn btn-primary" />
				  </div>

    </div>

      </div>


</div>

<script src="../..\js/AltaAticulo.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


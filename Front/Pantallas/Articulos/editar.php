
<?php
require "../head.php";
require "../header.php";
?>	


<body>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<fieldset>
    <div>
	<div class="form-group">
      <input type="file" id="archivo" name="archivo" accept=".jpg, .jpeg, .png" multiple="">

    </DIV>	


        <div id="fotos" class="row"> </diV>
	  <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" focus class="form-control" name="nombre" id="nombre"  placeholder="Ingrese el titulo...">
                  </div>
                  

                  	<div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" focus class="form-control" name="valor" id="valor"  placeholder="Ingrese el genero...">
                  </div>
                  <div class="form-group">
                        <label for="clasificacion">clasificacion:</label>
                        <input type="text" focus class="form-control" name="clasificacion" id="clasificacion"  placeholder="Ingrese la calificacion...">
                  </div>
                  
                  <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea type="text" focus class="form-control" name="descripcion" id="descripcion"  placeholder="Ingrese una descripción..."></textarea>
                  </div>
				  <div class="form-group">
				  <input type="button" id="btnEnviar"   onclick="Modificar()" value="Aceptar" class="btn btn-primary" />
				  </div>

    </div>
</fieldset>



  
</div>

</body>
</html>
<script src="../..\js/EditarArticulo.js"></script>
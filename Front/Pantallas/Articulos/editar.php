<?php
  require "../Head.php"
?>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>


<header sryle="position:flex;">
			<nav class="navbar navbar-expand-md navbar-dark navbar-fixed-top bg-dark">
			<img   width="50" height="50" class="rounded-circle"  src="../imagenes/logo.jpg" >
				<div class="container">

					<a style="color:white;" >     SwapArea</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>
				
						<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
								<a class="nav-link" href="../Articulos/BuscarArticulos.php"><i class="fa fa-home"></i> Inicio <span class="sr-only"></span></a>
							</li>

							<li class="nav-item active" id="misarticulos">
								<a class="nav-link" href="../Articulos/misArticulos.php"><i class="fa fa-cube" aria-hidden="true"></i> Articulos</a>
							</li>
							<li class="nav-item active" id="moneda">
								<a class="nav-link" href="../Moneda/compraMoneda.php"><i class="fa fa-coins"></i> Monedas</a>
							</li>
							<li class="nav-item active" id="Solicitudes">
								<a class="nav-link" href="../solicitudes/listadosolicitudes.php" ><i class="fa fa-handshake"></i> Solicitudes</a>
							</li>
							<li class="nav-item active" id="chat">
								<a class="nav-link" href="../Chat/BuscarUsuario.php"><i class="fa fa-comments"></i> Chats</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="../Contactanos/contactos.php"><i class="fa fa-phone"></i>Contactenos</a>
							</li>
				
						</ul>

						 <a id="perfil" href="../Usuarios/perfilUsuario.php" > <img id="Headerimg" src="" width="50" height="50" class="rounded-circle"  >
						  <a id="nombreuHeader" class="nav-link" style="color:white;"></a></a>

              <a class="nav-link" style="color:white;"   href="../Usuarios/Login.php" > <label id="log"></label>  <i class="fas fa-sign-out-alt" ></i></a>
					</div>
				</div>
			</nav>
		</header>



<script src="../../js/Header.js"></script>



<br>
<br>
<br>
<br>
<br>
<br>
    <div >
    <div class="row">
    <div class="col-md-4">
      </div>  
    <div class="col-md-4">
    <div id="fotos"> 
    </div>  
    </div>  

</div>
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
                        <label for="nombre">Nombre articulo:</label>
                        <input type="text" focus class="form-control" name="nombre" id="nombre"  placeholder="Ingrese el titulo...">
                  </div>
                  

                  	<div class="form-group">
                        <label for="valor">Valor articulo:</label>
                        <input type="text" focus class="form-control" name="valor" id="valor"  placeholder="Ingrese el genero...">
                  </div>
                  <div class="form-group">
                  <label for="clasificacion">Categoria:</label>
                        <select id="Categorias" class="custom-select form-control" style="width:100%; height:100%;" >
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



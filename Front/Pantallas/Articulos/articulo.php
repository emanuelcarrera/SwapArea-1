<?php
require "../head.php";

?>	

<head>
<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
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
								<a class="nav-link" href="../solicitudes/listadosolicitudes.php" ><i id="icovistosoli" class="fa fa-handshake"></i> Solicitudes</a>
							</li>
							<li class="nav-item active" id="chat">
								<a class="nav-link" href="../Chat/Chats.php"><i id="icovisto" class="fa fa-comments"></i> Chats</a>
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


<div>

<br>
<br>
<br>		  <br>		  	 
         <div class="container">
			 <div class="row">
				
                <div class="col-4" > 
					<div class="service-image-left border border-dark h-100 d-flex align-items-center justify-content-center rounded ">
                    
					      
						  <div id="fotos"> 		
						
                          </div>				
					  </div>
                  </div>	
					
				<div class="col-7 border border-dark rounded ">
					<div  style="padding:2%;">

					<div  >
				
                        <br>
                          <img id="imgfusu" src="" width="50" height="50" class="rounded-circle" alt="avatar" onclick="resirectChat(0)">
						  <label id="nombreusu"></label>

                     </div>
					 <hr>
					   <div class="product-title" style="font-family: Georgia;"><h3>  Nombre:<label class="card-text font-weight-light" id="lblnombre"> </h1> </div>
					
				     	<hr>
				    	<div class="product-price" style="font-family: Georgia;">Valor: $<label class="card-text font-weight-light" id="lblvalor"> </label></div>
				    	<hr>
				    	<div class="product-drecipction" style="font-family: Georgia;">Descripción: <label class="card-text font-weight-light" id="lbldescripcion"> </label></div>
				    	<hr>
				    	<div class="btn-group cart">
						<button type="button" id="btnintercambio" class="btn btn-success">
							Intercambiar
						</button>

					    </div>
				    	<div class="btn-group wishlist">
						  <button type="button" id="btncomprar" class="btn btn-danger">
							Comprar 
						  </button>
					    </div>
                        </div>

			       </div>	
			    </div>
	    	</div>
		<br>		  <br>		  <br>
		<hr>
		<div class="container">
		<div class="row">
			<div class="col-11">
	      <a>Comentarios </a>
		  <br>
          <textarea id="textcomentario" class="form-control" ></textarea>
		  <br>
		  <button type="button" class="btn btn-success" onclick="comentar()" >
							Comentar
		   </button>
		   <br>	
		   <br>
		   <div id="comentarios" >
		
		</div>
		   </div>
		   </div>
			</div>

			</div>
		</div>
		</div>
		</div>
		<br>		  <br>

		<?php
require "../footer.php";

?>	
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../..\js/VerArticulo.js"></script>
<script src="../../js/Header.js"></script>

<script src="../../css/comentarios.css"></script>
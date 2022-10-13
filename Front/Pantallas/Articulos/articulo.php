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


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 60px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
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
						  <!-- The Modal -->
<div id="myModal" class="modal">

<!-- The Close Button -->
<span class="close">&times;</span>

<!-- Modal Content (The Image) -->
<img class="modal-content" id="img01">

<!-- Modal Caption (Image Text) -->
<div id="caption"></div>
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


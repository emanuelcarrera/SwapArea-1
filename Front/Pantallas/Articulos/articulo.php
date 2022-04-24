<?php
require "../head.php";
require "../header.php";
?>	

<head>

</head>

<div class="container-fluid">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
				<div class="col-md-12">
				<br>		  <br>		  <br>		  <br>		 
					<div class="product col-md-3 service-image-left">
                    
						<center>
							<img id="item-display" src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
						</center>
					</div>
					
					<div class="container service1-items col-sm-2 col-md-2 pull-left">
						<center>
							<a id="item-1" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-2" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-3" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
						</center>
					</div>
				</div>
					
				<div class="col-md-7">
					<div class="product-title">Nombre :<label id="lblnombre"> </div>
					
					<hr>
					<div class="product-price">Valor : $<label id="lblvalor"> </label></div>
					<hr>
					<div class="product-drecipction">Descripcion : <label id="lbldescripcion"> </label></div>
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
		<br>		  <br>		  <br>
		<hr>
	      <a>Comentarios </a>
		  <br>
          <textarea id="textcomentario" ></textarea>
		  <br>
		  <button type="button" class="btn btn-success" onclick="comentar()" >
							Comentar
		   </button>
		   <br>

		<div id="comentarios" class="row">
			</div>
		</div>

		
	</div>
</div>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../..\js/VerArticulo.js"></script>
<?php
require "../head.php";
require "../header.php";
?>	

<head>

</head>

<br>		  <br>		  	 
         <div class="container">
			 <div class="row">
                <div class="col-4" > 
					<div class="service-image-left border border-dark h-100 d-flex align-items-center justify-content-center rounded ">
                    
					      <div style="padding:10%;" >
							<img id="item-display" src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""  width="300" height="300" class="rounded" ></img>		
                          </div>				
					  </div>
                  </div>	

					
				<div class="col-7 border border-dark rounded ">
					<div  style="padding:2%;">

					<div  >
				
                        <br>
                          <img id="imgfusu" src="" width="50" height="50" class="rounded-circle" alt="avatar">
						  <label id="nombreusu"></label>

                     </div>
					 <hr>
					   <div class="product-title">Nombre :<label class="card-text font-weight-light" id="lblnombre"> </div>
					
				     	<hr>
				    	<div class="product-price">Valor : $<label class="card-text font-weight-light" id="lblvalor"> </label></div>
				    	<hr>
				    	<div class="product-drecipction">Descripción : <label class="card-text font-weight-light" id="lbldescripcion"> </label></div>
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
			<div class="col-sm-9">
	      <a>Comentarios </a>
		  <br>
          <textarea id="textcomentario" class="form-control" ></textarea>
		  <br>
		  <button type="button" class="btn btn-success" onclick="comentar()" >
							Comentar
		   </button>
		   <br>	
		   <br>
		   <div class="container">
		   
		<div id="comentarios" class="row">
			</div>
			</div>
		</div>
		</div>
		</div>
		<br>		  <br>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../..\js/VerArticulo.js"></script>
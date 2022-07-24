<?php
require "../head.php";
require "../header.php";
?>	

<head>
<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>

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
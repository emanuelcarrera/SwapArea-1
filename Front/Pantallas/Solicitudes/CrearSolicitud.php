<?php
require "../head.php";
require "../header.php";
?>	

<br>
<br>

<div class="row" style="padding:5%;" >     
<div class="col-sm-5  border border-dark  rounded"  >    
<br><br>       
                    <center>
                        <img id="item-display" src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt="" class="border border-dark  rounded" width="200" height="200" ></img>
                    </center>
       
                
                    <br><br>

					<div class="product-title">Nombre: <label id="lblnombre"> </div>
					
					<hr>
					<div class="product-price">Valor: $<label id="lblvalor"> </label></div>
					<hr>
					<div class="product-drecipction">Descripción: <label id="lbldescripcion"> </label></div>
					
                

                    </div>
                    <div class="col-sm-1">
                    <br>
<br><br>
<br><br>
<br>       
						<button type="button" id="btnAceptar" class="btn btn-danger">
							Enviar
						</button>
				
                    </div>
<div class="col-sm-5  border border-dark  rounded" >
  

<br><br>
                            
                              <center>
                            <img id="item-display2" src="../imagenes/logo.jpg"  alt="" class="border border-dark  rounded" width="200" height="200" ></img>
                           </center>
                           <br><br>
                              <select class="custom-select form-control" id="misArticulos">
                              </select>
                         
                          

                              <hr>
              
                        
                        <input type="text" focus class="form-control" name="monto" id="txtmonto"  placeholder="Ingrese el monto...">
                        <hr>
                        
                        <input type="text" focus class="form-control" name="comentario" id="txtcomentario"  placeholder="Ingrese el comentario...">
          

                        <br>


                    </div>

</div>

<?php
require "../footer.php";

?>	
<script src="../../js/CrearSolicitud.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
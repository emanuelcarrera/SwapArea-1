<?php
require "../head.php";
require "../header.php";
?>	


<br>
<br>
<br>
<br>
<div>
<div class="form-group">

<div class="col-md-7">
<div class="product col-md-3 service-image-left">
                    
                    <center>
                        <img id="item-display" src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
                    </center>
                </div>   </div>
                

                <fieldset>

					<div class="product-title">Nombre :<label id="lblnombre"> </div>
					
					<hr>
					<div class="product-price">Valor : $<label id="lblvalor"> </label></div>
					<hr>
					<div class="product-drecipction">Descripcion : <label id="lbldescripcion"> </label></div>
					<hr>
                
                    </div>



                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Mis Articulos para ofrecer</h4></label>
                              <select class="custom-select form-control" id="misArticulos">
                              </select>
                          </div>   </div>



                          <br>
                  <div class="form-group">
                        <label for="nombre">Monto:</label>
                        <input type="text" focus class="form-control" name="monto" id="txtmonto"  placeholder="Ingrese el monto...">
                 </div>
                  <div class="form-group">
                        <label for="nombre">Comntario:</label>
                        <input type="text" focus class="form-control" name="comentario" id="txtcomentario"  placeholder="Ingrese el comentario...">
                  </div>
                  
</fieldset>
                  <div class="btn-group wishlist">
						<button type="button" id="btnAceptar" class="btn btn-danger">
							Enviar Solicitud 
						</button>
					</div>

                          <br>
                          <br>
                          <br>





</div>
<script src="../../js/CrearSolicitud.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
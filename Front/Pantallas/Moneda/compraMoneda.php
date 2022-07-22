<?php
require "../head.php";
require "../header.php";
?>	


<br>
<div class="row">
<div class="col-md-4">
</div>
   <div class="col-md-4 border border-dark rounded p-3 mb-2 bg-secondary text-white" style="text-align: center;">
     
   
   <br>
      	
          <div class="item-inner">
            <div class="item-title item-label">Tipo de Tarjeta</div>
            <div class="item-input-wrap input-dropdown-wrap">
              <select id="TipoTarjeta" placeholder="Please choose...">
                <option value="Visa">Visa</option>
                <option value="Master">Master</option>
                <option value="Amex">Amex</option>
                <option value="Cabal">Cabal</option>
              </select>
            </div>
          </div>

          <div class="item-inner">
            <div class="item-title item-label">Tarjeta</div>
            <div class="item-input-wrap">
              <input id="Tarjeta" type="text" placeholder="Numero">
              <span class="input-clear-button"></span>
            </div>
          </div>

          <div class="item-inner">
            <div class="item-title item-label">Nombre en la tarjeta</div>
            <div class="item-input-wrap">
              <input id="nombre" type="text" placeholder="Nombre en la tarjeta">
              <span class="input-clear-button"></span>
            </div>
          </div>

          <div class="item-inner">
            <div class="item-title item-label">CVV</div>
            <div class="item-input-wrap">
              <input id="CVV" type="password" placeholder="Ingrese los 3 digitos" maxlength="3">
              <span class="input-clear-button"></span>
            </div>
          </div>

          <div class="item-inner">
            <div class="item-title item-label">Fecha de vencimiento</div>
            <div class="item-input-wrap">
              <input id="VtoM" type="number" min="0" max="12" placeholder="MM"  >
              <input id="VtoA" type="number"  min="22" max="99" placeholder="AA" >
              <span class="input-clear-button"></span>
          
            </div>
          </div>

          <div class="item-inner">
            <div class="item-title item-label">Cantidad de monedas</div>
            <input id="cantidad" type="number" placeholder="Cantidad">
          </div>
      
        <br>

        <button class="btn btn-primary" id="btncomprar" onclick="Comprar()" type="submit">Comprar</button>
    <br>
    <br> 
  </div>
 </div>
</div>
<div class="col-md-4">
</div>
</div>
<div class="row">
<div class="col-md-9">
</div>
<div class="col-md-3">
  
  <input  class="btn btn-primary" type="button" value="Ir a historial" onClick=" window.location.href='historialmoneda.php' ">
</div>
</div>
<script src="../../js/CompraMoneda.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

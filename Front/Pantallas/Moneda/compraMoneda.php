<?php
require "../head.php";
require "../header.php";
?>	



   
   
      <ul>
      	<li class="item-content item-input">
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
        </li>
        <li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Tarjeta</div>
            <div class="item-input-wrap">
              <input id="Tarjeta" type="text" placeholder="Numero">
              <span class="input-clear-button"></span>
            </div>
          </div>
        </li>
        <li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Nombre en la tarjeta</div>
            <div class="item-input-wrap">
              <input id="nombre" type="text" placeholder="Numero">
              <span class="input-clear-button"></span>
            </div>
          </div>
        </li>
        <li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">CVV</div>
            <div class="item-input-wrap">
              <input id="CVV" type="password" placeholder="Ingrese los 3 digitos" maxlength="3">
              <span class="input-clear-button"></span>
            </div>
          </div>
        </li>
        <li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Fecha de vencimiento</div>
            <div class="item-input-wrap">
              <input id="Vto" type="date" placeholder="MM/AA">
              <span class="input-clear-button"></span>
              <label id="lblVto" visible="false" style="visibility:hidden;" > Fecha de vencimiento obligatorio  </label>
            </div>
          </div>
        </li>
        
        <li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Cantidad de monedas</div>
            <input id="cantidad" type="number" placeholder="Cantidad">
          </div>
        </li>
        <br>

        <button class="btn btn-primary" id="btncomprar" onclick="Comprar()" type="submit">Comprar</button>
      </ul>

  </div>
</div>

<script src="../../js/CompraMoneda.js"></script>

<?php 
    require "../footer.php";
 ?>
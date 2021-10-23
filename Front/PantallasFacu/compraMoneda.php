<?php
require "head.php";
require "header.php";
?>	



   
    <form action="comprarMonedaMail.php" method="post">
      <ul>
      	<li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Tarjeta</div>
            <div class="item-input-wrap input-dropdown-wrap">
              <select name="TipoTarjeta" placeholder="Please choose...">
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
              <input name="Tarjeta" type="text" placeholder="Numero">
              <span class="input-clear-button"></span>
            </div>
          </div>
        </li>
        <li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">CVV</div>
            <div class="item-input-wrap">
              <input name="CVV" type="password" placeholder="Ingrese los 3 digitos">
              <span class="input-clear-button"></span>
            </div>
          </div>
        </li>
        <li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Fecha de vencimiento</div>
            <div class="item-input-wrap">
              <input name="Vto" type="text" placeholder="MM/AA">
              <span class="input-clear-button"></span>
            </div>
          </div>
        </li>
        
        <li class="item-content item-input">
          <div class="item-inner">
            <div class="item-title item-label">Cantidad de monedas</div>
            <div class="item-input-wrap input-dropdown-wrap">
              <select name="Cantidad" placeholder="Seleccione">
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
            </div>
          </div>
        </li>
        

            </div>
          </div>
        </li>
        <br>

        <button class="btn btn-primary" type="submit">Submit form</button>
      </ul>
    </form>
  </div>
</div>

<?php 
    require "footer.php";
 ?>
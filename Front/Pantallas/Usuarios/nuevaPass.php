<?php
require "../head.php";
require "../header.php";
require("connection.php");
?>  
<br>
<br>

<div class="col-md-6">
    <form action="passcambiada.php" method="post">
    <input type="text" name="mailLaboral" placeholder="Email" id="mailLaboral" required>
    <input type="text" name="Pass" placeholder="Ingrese nueva pass" id="Pass" required>
    <input type="text" name="Passbis" placeholder="Vuelva ingresar la nueva pass" id="Pass" required>
    <button href="login.php" id="BotonLogin">Recuperar pass</button>
    <div id="msjError"></div>
  </form>
</div>




  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
<?php 
require "../footer.php";
 ?>
<?php
require "funciones.php";
require "head.php";
$_SESSION["log"]      = TRUE;
$_SESSION["usuario"]  = "mariano@gmail.com";
$_SESSION["permisos"] = array(1,2,3,4);
?>  

<form class="form-signin" method="POST" action="index.php">
  <div class="text-center mb-4">
    <img class="mb-4" src="images/logo.png" alt="" width="80%" height="80%">
    <br><br>

    <div class="form-label-group">
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputEmail">Email address</label>
    </div>

    <div class="form-label-group">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <label for="inputPassword">Password</label>
    </div>

    <div class="text-right">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordar
        </label>
      </div>
      <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-unlock-alt"></i> Ingresar</button>
      <a href="index.php" class="btn btn-lg btn-primary"><i class="fa fa-reply"></i> Volver</a>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</form>
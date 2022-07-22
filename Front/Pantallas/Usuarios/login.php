<?php
require "../head.php";

?>	


<div class="container">
<div class="row">
  		<div class="col-sm-10"><h1> <label id="lblUser"></label> </h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive rounded-circle" width="100" height="100" src="../imagenes/logo.jpg"></a></div>
    </div>
	<div class="row">
	<div class="col-md-4">
</div>
		<div class="col-md-4 border border-dark  rounded ">

				<fieldset>
				<br>
				<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<h3 >Login</h3>
                </div>
				<div class="col-md-4">
				</div>
				</div>

					<div class="form-group">
						<label for="name">Nombre de Usuario</label>
						<input type="text"  placeholder="Ingresar Nombre de usuario" id="NombreUsuariotxt"  required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Contraseña</label>
						<input type="password" id="Contraseñatxt"  placeholder="Ingresar Contraseña" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="button" id="btnEnviar" value="Iniciar Sesion" class="btn btn-primary" />
						<input type="button" value="recuperar" class="btn btn-default" onClick=" window.location.href='recupero.php' ">
					</div>
				</fieldset>
				<br>
		
				
		     No tienes cuenta? <a href="register.php">Regitrate aqui</a>
		</div>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>

	<div class="col-md-4">
</div>
</div>


</body>
</html>

<script src="../..\js/Login.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--<script src="../..\js/Header.js"></script>-->

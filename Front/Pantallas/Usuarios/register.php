<?php
require "../head.php";

?>	


<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Registro</legend>

					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" id="txtNombre" name="name" placeholder="Nombres" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Apellido</label>
						<input type="text" id="txtApellido" name="name" placeholder="Apellidos" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Nombre usuario</label>
						<input type="text" id="txtNombreUsuario" name="name" placeholder="Nombre usuario" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="email" id="txtEmail" name="email" placeholder="Correo Electrónico" required  class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Edad</label>
						<input type="number" id="txtEdad" name="name" placeholder="Nombre usuario" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="number">DNI</label>
						<input type="text" id="txtDni" name="name" placeholder="Nombre usuario" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="number">Telefono</label>
						<input type="text" id="txtTelefono" name="name" placeholder="Telefono" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Contraseña</label>
						<input type="password" id="txtpass" name="password" placeholder="Contraseña" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Repita Contraseña</label>
						<input type="password" id="txtpass2" name="cpassword" placeholder="Confirmar Contraseña" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div> 

					


					<div class="form-group">
						<input type="button" id="btnAceptar" name="signup" value="Registrar" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Ya te registaste? <a href="login.php">Logeate Aqui</a>
		</div>
	</div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

<script src="../../js/Usuarios.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
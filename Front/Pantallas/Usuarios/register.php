<?php
require "../head.php";

?>	


<div class="container">

	<div class="row">
	<div class="col-md-4" >

	</div>
		<div class="col-md-4 border border-dark  rounded">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Registro</legend>

					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" id="txtNombre" name="name" placeholder="Nombre" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Apellido</label>
						<input type="text" id="txtApellido" name="name" placeholder="Apellido" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Nombre usuario</label>
						<input type="text" id="txtNombreUsuario" name="name" placeholder="Nombre usuario" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="email" id="txtEmail" name="email" placeholder="Email" required  class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Edad</label>
						<input type="number" id="txtEdad" name="name" placeholder="Edad" required  class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="number">DNI</label>
						<input type="text" id="txtDni" name="name" placeholder="DNI" required  class="form-control" />
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
						<label for="name">Confirmar Contraseña</label>
						<input type="password" id="txtpass2" name="cpassword" placeholder="Confirmar Contraseña" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div> 

					


					<div class="form-group">
						<input type="button" id="btnAceptar" name="signup" value="Registrar" class="btn btn-primary" />
					</div>
				</fieldset>
				<div>	
	         	Ya te registaste? <a href="login.php">Logeate Aqui</a>
		</div>
		
			</form>

		
		
		</div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive rounded-circle" width="100" height="100" src="../imagenes/logo.jpg"></a></div>

		<br>
		<br>



	
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

<script src="../../js/Usuarios.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
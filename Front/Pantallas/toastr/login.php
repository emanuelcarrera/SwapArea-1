<?php

$_SESSION["log"]      = TRUE;
$_SESSION["usuario"]  = "mariano@gmail.com";
$_SESSION["permisos"] = array(1,2,3,4);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de session</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<script src="..\js/Login.js"></script>

</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php" style="font-family: 'Lobster', cursive;">devHuayra</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="login.php">Login</a></li>
				<li><a href="register.php">Registro</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">

				<fieldset>
					<legend>Login</legend>
					<!--div class="form-group clearfix">
						<img src="http://www.iconsfind.com/wp-content/uploads/2016/10/20161014_58006bff8b1de.png" alt="" width="200px" class="img-responsive img-circle" style="margin:0 auto">
					</div-->

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
						<input type="reset" value="Limpiar" class="btn btn-default" >
					</div>
				</fieldset>
		
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		No tienes cuenta? <a href="register.php">Regitrate aqui</a>
		</div>
	</div>
</div>


</body>
</html>

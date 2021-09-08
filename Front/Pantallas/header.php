		<header>
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
				<div class="container">
					<a class="navbar-brand" href="#">SwapArea</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.php"><i class="fa fa-home"></i> Inicio <span class="sr-only"></span></a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="peliculas.php"><i class="fa fa-film"></i> articulos</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="contactos.php"><i class="fa fa-comments"></i> Contactenos</a>
							</li>
							
						</ul>
						<?php if ($_SESSION["log"]): ?>
							<span class="usuario-logueado"><i class="fa fa-user"></i> Bienvenido <?php echo $_SESSION["correo"]; ?></span>
							<a href="logout.php" class="btn btn-danger"><i class="fa fa-unlock-alt"></i> Salir</a>
						<?php else: ?>
							<a href="login.html" class="btn btn-primary"><i class="fa fa-unlock-alt"></i> Ingresar</a>
						<?php endif; ?>

					</div>
				</div>
			</nav>
		</header>
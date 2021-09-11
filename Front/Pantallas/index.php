<?php
require "funciones.php";
require "head.php";
require "header.php";

?>	

<!-- Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="images/carousel1.jpg">
			<div class="container">
				<div class="carousel-caption text-left">
					<h1>Las mejores clasificaciones de las mejores peliculas</h1>
					<p>Las mas nuevas y vistas</p>
					<p><a class="btn btn-lg btn-primary" href="peliculas.php" role="button"><i class="fa fa-check"></i> Descubri mas</a></p>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="images/carousel2.jpg">
			<div class="container">
				<div class="carousel-caption">
					<h1>Podes contactarte con nosotros</h1>
					<p>Si no encontras la pelicula que buscas escribinos que podemos subirla para vos</p>
					<p><a class="btn btn-lg btn-success" href="contactos.php" role="button"><i class="fa fa-search"></i>Contactanos</a></p>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="images/carousel3.jpg">
			<div class="container">
				<div class="carousel-caption text-right">
					<h1>Mira las mejores criticas</h1>
					<p>Tenemos los mejores criticos del mercado analizando todo para vos!</p>
					<p><a class="btn btn-lg btn-warning" href="index.php" role="button"><i class="fa fa-image"></i>Ingresa</a></p>
				</div>
			</div>
		</div>
	</div>
	<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div> <!-- /#myCarousel -->

<div class="container">

	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading">Los clasicos de siempre<span class="text-muted"> Como nunca los viste antes</span></h2>
			<p class="lead">No solo vas a encontrar el analisis de las peliculas nuevas si no tambien de las mejores peliculas de la historia</p>
		</div>
		<div class="col-md-5">
			<img src="images/p1.jpg" height="230px">
		</div>
	</div>

	<hr class="featurette-divider">

	<div class="row featurette">
		<div class="col-md-6 order-md-2">
			<h2 class="featurette-heading">Lo nuevo<span class="text-muted"> Primero que todo</span></h2>
			<p class="lead">Antes de que la pelicula se estrene lee los comentarios</p>
		</div>
		<div class="col-md-6 order-md-1">
			<img src="images/p2.jpg" height="230px" >
		</div>
	</div>

	<hr class="featurette-divider">

	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading">Todas las semanas<span class="text-muted"> novedades y contenido nuevo</span></h2>
			<p class="lead">Estamos constantemente subiendo material nuevo para vos!</p>
		</div>
		<div class="col-md-5">
			<img src="images/p3.jpg" height="230px">
		</div>
	</div>

	<hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->

</div> <!-- /.container -->

<?php
require "footer.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TOASTR</title>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<br><br>
				<button onclick="prueba1();">Èxito</button>
				<br><br>
			</div>
			<div class="col-md-3">
				<button onclick="prueba2();">Advertencia</button>
				<br><br>
			</div>
			<div class="col-md-3">
				<button onclick="prueba3();">Error</button>
				<br><br>
			</div>
			<div class="col-md-3">
				<button onclick="prueba4();">Borrar TOASTR</button>
				<br><br>
			</div>
		</div>
	</div>
	<script>
		function prueba1() {
			toastr.success("El mensaje muestra un texto de èxito...", "Mensaje de ÈXITO");
		}
		function prueba2() {
			toastr.warning("El mensaje muestra un texto de advertencia...", "Mensaje de advertencia");
		}
		function prueba3() {
			toastr.error("El mensaje muestra un texto de error...", "Mensaje de ERROR");
		}
		function prueba4() {
			toastr.clear();
		}
	</script>


</body>
</html>
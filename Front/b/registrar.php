<?php

$correo = $_POST["correo"];
$palabra_secreta = $_POST["palabra_secreta"];
$palabra_secreta_confirmar = $_POST["palabra_secreta_confirmar"];

if ($palabra_secreta !== $palabra_secreta_confirmar) {
    echo "Las contraseñas no coinciden, intente de nuevo";
    exit;
}

include_once "funcioneslogin.php";

$existe = usuarioExiste($correo);
if ($existe) {
    echo "Lo siento, ya existe alguien registrado con ese correo";
    exit; 
}


$registradoCorrectamente = registrarUsuario($correo, $palabra_secreta);
if ($registradoCorrectamente) {
    echo "Registrado correctamente. Ahora puedes iniciar sesión";

} else {
    echo "Error al registrarte. Intenta más tarde";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Primer Parcial</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="addons/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="addons/toastr/toastr.min.css">
        <link rel="stylesheet" type="text/css" href="addons/fa/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="addons/bootstrap/js/bootstrap.min.js"></script>
        <script src="addons/popper/popper.min.js"></script>
        <script type="text/javascript" src="addons/toastr/toastr.min.js"></script>
</head>
<body>
	<a type="button" class="btn btn-outline-danger btn-lg" href="login.html">volver</a>
</body>
</html>




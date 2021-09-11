<?php

$correo = $_POST["correo"];
$palabra_secreta = $_POST["palabra_secreta"];


include_once "funcionesLogin.php";
$logueadoConExito = login($correo, $palabra_secreta);
if ($logueadoConExito) {
   
    header("Location: index.php");
    $_SESSION["log"]      = TRUE;
    exit;
} else {
    
    echo "Usuario o contraseña incorrecta";
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
	<a type="button" class="btn btn-outline-danger btn-lg" href="index.php">volver</a>
</body>
</html>

<?php

session_start();
$_SESSION["log"]      = FALSE;
$_SESSION["usuario"]  = "";
$_SESSION["permisos"] = array();
header("location:index.php");
exit;

?>
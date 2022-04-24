<?php

	$server="127.0.0.1:3308";
	$user="root";
	$pass="";
	$db="pro3";
	$port ="3308";
    // connect to mysql 
      
    $conexion= mysqli_connect($server, $user, $pass) or die("Sorry, can't connect to the mysql."); 
      
    // select the db 
      
    mysqli_select_db($conexion,$db) or die("Sorry, can't select the database."); 
	return $conexion;
	

?>
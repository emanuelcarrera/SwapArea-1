<?php

	$server="localhost";
	$user="root";
	$pass="";
	$db="practicapro";
	
    // connect to mysql 
      
    $conexion= mysqli_connect($server, $user, $pass) or die("Sorry, can't connect to the mysql."); 
      
    // select the db 
      
    mysqli_select_db($conexion,$db) or die("Sorry, can't select the database."); 
	return $conexion;
	

?>
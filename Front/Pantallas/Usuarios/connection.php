<?php

	$server="localhost";
	$user="root";
	$pass="";
	$db="pro3";
	$port ="3308";
    // connect to mysql 

    $conexion= new PDO('mysql:host=localhost;port=3308;dbname=pro3', 'root', '');
      
    // select the db 
      
    mysqli_select_db($conexion,$db) or die("Sorry, can't select the database."); 
	return $conexion;
	

?>
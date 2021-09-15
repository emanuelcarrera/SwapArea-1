<?php

/*=======================================================================*/
/* Conectar
/*=======================================================================*/
function conectar() {
	$conexion =  mysqli_connect("127.0.0.1", "root", "", "practicapro");
	if (!$conexion) {
		echo "Error conectando a la base de datos!";
		exit;
	} 
	return $conexion;
}

/*=======================================================================*/
/* miQuery
/*=======================================================================*/
function miQuery($query) {

	$db  = conectar();
	$qry = mysqli_query($db, $query);
	if ($qry) {
		$resultado = array();
		while ($q = mysqli_fetch_assoc($qry)) {
			$resultado[] = $q;
		}
		return $resultado;
	}
	return false;
}

/*=======================================================================*/
/* borrarUsuario
/*=======================================================================*/
function borrarArticulo() {

	$usr = miQuery("SELECT * FROM articulos");
	if ($usr) {
		$db = conectar();
		mysqli_query($db, "DELETE FROM articulos WHERE id = " . $usr[0]["id"]);
		return true;
	}
	return false;
}

/*=======================================================================*/
/* editarUsuario
/*=======================================================================*/
function editarArticulo() {

	$usr = miQuery("SELECT * FROM usuarios");
	if ($usr) {
		$db = conectar();
		mysqli_query($db, "UPDATE articulos SET nombre='$nombre',valor='$valor',calificacion='$calificacion',clasificacion='$clasificacion',foto='$foto',descripcion='$descripcion' WHERE id= " . $usr[0]["id"]);
		return true;
	}    
	return false;
}

session_start();
if (!isset($_SESSION["log"])) {
	$_SESSION["log"] = TRUE;
}


try {
    $pdo = new PDO('mysql:host=localhost;dbname=practicapro', 'root', '');
   // echo 'conectado';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
<?php
//conectar.php
Class Conectar
{
    

    public static function con(){
    	$con =  mysqli_connect("127.0.0.1", "root", "", "practicapro");
        
        return $con;
    }
}
?>
<?php

require "funciones.php";

$db = conectar();




mysqli_query($db, 'DROP TABLE IF EXISTS movies');
$tb = mysqli_query($db, '
		CREATE TABLE movies (
			id INT(4) NOT NULL AUTO_INCREMENT, 
			titulo VARCHAR(50) NOT NULL,
			genero VARCHAR(20),
			duracion INT(50) ,
			descripcion TEXT(1000) NOT NULL,
			puntaje VARCHAR (10) ,
			linkImagen varchar (100) NOT NULL,
			anio INT (10) ,
			PRIMARY KEY (id)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	');
if (!$tb) {
	echo "Error al intentar crear la tabla 'movies'.";
} else { 
	echo "Tabla 'movies' creada correctamente.<br>";
}

$movies = mysqli_query($db, '
	INSERT INTO movies (id, titulo, genero, duracion, descripcion, puntaje, linkImagen, anio) VALUES
	(" ", "Joker", "Drama, Thriller", "122", "In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker.", "80,5", "https://i.pinimg.com/564x/3a/04/13/3a041380e5bdd94591d928f2a2458e6e.jpg", "2019"),
	(" ", "The Godfather", "Drama", "175", "The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son. ", "9,2", "https://es.web.img3.acsta.net/pictures/18/06/12/12/12/0117051.jpg", "1972"),
	(" ", "The Wolf of Wall Street", "Biography, Crime, Drama", "180", "Based on the true story of Jordan Belfort, from his rise to a wealthy stock-broker living the high life to his fall involving crime, corruption and the federal government. ", "8,2", "https://m.media-amazon.com/images/M/MV5BMjIxMjgxNTk0MF5BMl5BanBnXkFtZTgwNjIyOTg2MDE@._V1_SY1000_CR0,0,674,1000_AL_.jpg", "2013"),
	(" ", "Forrest Gump", "Drama, Romance", "142", "The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate and other historical events unfold through the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart. ", "8,8", "https://i.pinimg.com/originals/9d/4e/23/9d4e23ab073ffe5492051cd348128863.jpg", "1994")
	');
if (!$movies) {
	echo "Error al intentar agregar registros a la tabla 'movies'.";
} else {
	echo "Registros agregados a 'movies' correctamente.<br>";
}


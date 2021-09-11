-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2020 a las 17:27:11
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `primerparcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE IF NOT EXISTS `pelicula` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `duracion` int(50) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `puntaje` decimal(10,0) DEFAULT NULL,
  `linkImagen` varchar(100) NOT NULL,
  `anio` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `genero`, `duracion`, `descripcion`, `puntaje`, `linkImagen`, `anio`) VALUES
(1, 'peli de prueba', 'accion', 120, 'Es alta peli perro', '5', 'https://aprecineray.files.wordpress.com/2014/04/carc3a1tula2.jpg', 2004),
(2, 'peli de prueba', 'accion', 120, 'Es alta peli perro', '5', 'https://aprecineray.files.wordpress.com/2014/04/carc3a1tula2.jpg', 2004),
(6, 'Lo que el viento se llevo', 'drama', 120, 'es un clasico del cine', '5', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSIcUXfxJaERhOlbxkkIFCkAmwr3iZPMPNtsCWghHNyox99', 1950);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

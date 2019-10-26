-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-08-2014 a las 22:18:54
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `josmaspergri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontactos`
--

CREATE TABLE IF NOT EXISTS `tblcontactos` (
  `intContador` int(11) NOT NULL AUTO_INCREMENT,
  `strNombres` varchar(50) DEFAULT NULL,
  `strApellidos` varchar(50) DEFAULT NULL,
  `intAsunto` int(11) DEFAULT NULL,
  `strPais` varchar(50) DEFAULT NULL,
  `strEstado` varchar(50) NOT NULL,
  `strCiudad` varchar(50) NOT NULL,
  `yearEdad` varchar(20) DEFAULT NULL,
  `strComentarios` varchar(500) NOT NULL,
  `strTelefono` varchar(50) DEFAULT NULL,
  `strEmail` varchar(100) NOT NULL,
  PRIMARY KEY (`intContador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tblcontactos`
--

INSERT INTO `tblcontactos` (`intContador`, `strNombres`, `strApellidos`, `intAsunto`, `strPais`, `strEstado`, `strCiudad`, `yearEdad`, `strComentarios`, `strTelefono`, `strEmail`) VALUES
(7, 'Ruvier', 'Griman', 5, 'Venezuela', 'Miranda', 'Cagua', '14/07/83', 'Soy tu tio', NULL, 'ruvier9@gmail.com'),
(8, 'Jose', 'Pereira', 4, 'Venezuela', 'Miranda', 'Los teques', '05/11/96', 'Hola jose', NULL, 'jmanuelpereira2@gmail.com'),
(9, 'Manuel', 'Griman', 6, 'Venezuela', 'Miranda', 'Carrizal', '5/11/96', 'Hola bro', '0424-2435324', 'Jmanuelpereira96@gmail.com'),
(10, 'vfvfvfv', 'fvf', 0, 'f', 'v', 'vf', 'Ejm:05/11/1996', 'vfvf', '344', 'fvfv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontenido`
--

CREATE TABLE IF NOT EXISTS `tblcontenido` (
  `intContador` int(11) NOT NULL AUTO_INCREMENT,
  `txtContenido` text NOT NULL,
  `strImagen` varchar(500) NOT NULL,
  PRIMARY KEY (`intContador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tblcontenido`
--

INSERT INTO `tblcontenido` (`intContador`, `txtContenido`, `strImagen`) VALUES
(1, 'Hola probando el anuncio espero si funciones bien con 2 lineas o mas jejeeje que bueno que esta pagina se creo porbando...', 'Logo20MERCANTIL.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblplanes`
--

CREATE TABLE IF NOT EXISTS `tblplanes` (
  `intContador` int(11) NOT NULL,
  `txtPlanbasico` text NOT NULL,
  `txtPlan1` text NOT NULL,
  `txtPlan2` text NOT NULL,
  `txtPlan3` text NOT NULL,
  `txtPlan4` text NOT NULL,
  PRIMARY KEY (`intContador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblplanes`
--

INSERT INTO `tblplanes` (`intContador`, `txtPlanbasico`, `txtPlan1`, `txtPlan2`, `txtPlan3`, `txtPlan4`) VALUES
(0, 'efefv', 'Website-------------Gratis', 'Hola probando el anuncio espero s funciones bien con k,k,', 'Con el proposito de logar alcanzar una calidad de k,k,k,', 'Hola probando el anuncio espero s funciones bien con k,k,');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblregistrados`
--

CREATE TABLE IF NOT EXISTS `tblregistrados` (
  `intContador` int(11) NOT NULL AUTO_INCREMENT,
  `strUsuario` varchar(100) DEFAULT NULL,
  `strContrasena` varchar(100) DEFAULT NULL,
  `strConfircontra` varchar(100) DEFAULT NULL,
  `strEmail` varchar(100) NOT NULL,
  PRIMARY KEY (`intContador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tblregistrados`
--

INSERT INTO `tblregistrados` (`intContador`, `strUsuario`, `strContrasena`, `strConfircontra`, `strEmail`) VALUES
(1, 'Jmanuelpereira', '11051.jm', '11051.jm', 'jmanuelpereira2@gmail.com'),
(6, 'Josmaspergri', '2553191711051.jm', '2553191711051.jm', 'administradores@imagesofglory.hol.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblslider`
--

CREATE TABLE IF NOT EXISTS `tblslider` (
  `idContador` int(11) NOT NULL AUTO_INCREMENT,
  `strImagen1` varchar(100) NOT NULL,
  `strLink1` varchar(200) NOT NULL,
  `intOrden` varchar(2000) DEFAULT NULL,
  `intEstado` int(11) NOT NULL,
  PRIMARY KEY (`idContador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tblslider`
--

INSERT INTO `tblslider` (`idContador`, `strImagen1`, `strLink1`, `intOrden`, `intEstado`) VALUES
(1, '001.jpg', 'index.php', '1', 1),
(2, '002.jpg', 'chat.php', '3', 1),
(3, '004.jpg', 'index.php', '4', 1),
(4, '003.jpg', 'index.php', '2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblteamviewer`
--

CREATE TABLE IF NOT EXISTS `tblteamviewer` (
  `intContador` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `strIDjosmaspergri` varchar(20) NOT NULL,
  `strIDteamviewer` varchar(20) NOT NULL,
  `strContrasenateam` varchar(50) NOT NULL,
  `txtComentarios` text NOT NULL,
  PRIMARY KEY (`intContador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tblteamviewer`
--

INSERT INTO `tblteamviewer` (`intContador`, `strNombre`, `strIDjosmaspergri`, `strIDteamviewer`, `strContrasenateam`, `txtComentarios`) VALUES
(1, 'Jose', '7', '0251916', '11051.jm', 'Necesito que est funcione sl base de datos no carga y no se que hacer.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblversiculodiario`
--

CREATE TABLE IF NOT EXISTS `tblversiculodiario` (
  `intContador` int(11) NOT NULL AUTO_INCREMENT,
  `txtContenido` text NOT NULL,
  PRIMARY KEY (`intContador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tblversiculodiario`
--

INSERT INTO `tblversiculodiario` (`intContador`, `txtContenido`) VALUES
(1, 'aqui versiculo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

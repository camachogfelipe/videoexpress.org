-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-03-2011 a las 21:13:04
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `liceoan_anglo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--
-- Creación: 27-02-2011 a las 21:04:27
-- Última actualización: 27-02-2011 a las 21:09:11
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `alumno` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `area` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `curso` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `archivo` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `user` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_usr`
--
-- Creación: 10-02-2011 a las 21:53:08
-- Última actualización: 03-03-2011 a las 21:07:10
--

DROP TABLE IF EXISTS `cat_usr`;
CREATE TABLE IF NOT EXISTS `cat_usr` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_usuario` int(1) NOT NULL,
  `clave_acceso` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `token` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `activo` int(1) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `cat_usr`
--

INSERT INTO `cat_usr` (`codigo`, `usuario`, `tipo_usuario`, `clave_acceso`, `correo`, `token`, `activo`) VALUES
(1, 'liceo', 2, '21232f297a57a5a743894a0e4a801fc3', 'gerencia@videoexpress.org', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profileusuario`
--
-- Creación: 16-02-2011 a las 07:11:02
-- Última actualización: 03-03-2011 a las 21:09:24
--

DROP TABLE IF EXISTS `profileusuario`;
CREATE TABLE IF NOT EXISTS `profileusuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `creado` datetime NOT NULL,
  `ultimo_acceso` datetime NOT NULL,
  `ultima_actualizacion_notas` datetime NOT NULL,
  `ENB` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `VTB` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `EB` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `IPLE` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `LPE` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `EPE` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `SFIG` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `VFIG` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `EFIG` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `EMUB` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `SFP` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  `MU` enum('N','Y') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `profileusuario`
--

INSERT INTO `profileusuario` (`codigo`, `nombre`, `apellidos`, `correo`, `creado`, `ultimo_acceso`, `ultima_actualizacion_notas`, `ENB`, `VTB`, `EB`, `IPLE`, `LPE`, `EPE`, `SFIG`, `VFIG`, `EFIG`, `EMUB`, `SFP`, `MU`) VALUES
(1, 'Manuel', 'Obando', 'gerencia@liceoanglocolombiano.edu.co', '2011-02-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

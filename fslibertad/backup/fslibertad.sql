-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-04-2011 a las 16:43:13
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `c274400_fslibertad`
--
CREATE DATABASE `c274400_fslibertad` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `c274400_fslibertad`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--
-- Creación: 27-04-2011 a las 13:56:18
-- Última actualización: 27-04-2011 a las 15:08:47
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `monte` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `ultima_actividad` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `donde` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `quienes` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `personas_impactadas` int(10) NOT NULL DEFAULT '0',
  `fotos` varchar(1000) COLLATE latin1_spanish_ci NOT NULL,
  `logo_proyecto` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `video` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `inversion_pesos` int(10) NOT NULL DEFAULT '0',
  `inversion_dolares` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_proyecto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Proyectos de como vamos' AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyecto`, `monte`, `nombre`, `fecha_inicio`, `fecha_final`, `ultima_actividad`, `donde`, `quienes`, `personas_impactadas`, `fotos`, `logo_proyecto`, `descripcion`, `video`, `inversion_pesos`, `inversion_dolares`) VALUES
(1, 'religion', 'Iglesia', '2011-04-27', '0000-00-00', 'Definici&oacute;n y creaci&oacute; del proyecto', 'Iglesia Cuadrangular de Fontibon', 'Equipo de pastores, Igles&iaacute; infantil, Cuerpo medico, Odontologos voluntarios', 320, '', 'icono_iglesia.png', 'Proyecto de prueba para demostraci&oacute;n de la secci&oacute;n en que vamos.', '', 2500000, 1000);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

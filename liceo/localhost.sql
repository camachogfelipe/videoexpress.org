-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-03-2011 a las 20:21:04
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
DROP DATABASE `liceoan_anglo`;
CREATE DATABASE `liceoan_anglo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `liceoan_anglo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--
-- Creación: 10-03-2011 a las 09:52:45
-- Última actualización: 11-03-2011 a las 17:04:47
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `alumno` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `area` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `curso` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `archivo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `user` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `titulo`, `alumno`, `area`, `curso`, `archivo`, `user`) VALUES
(1, 'trabajo en pdf', 'felipe camacho', 'expresión oral', 'Primero', 'felipecamachoprimero/eltabernaculotomo1.pdf', 'liceo'),
(2, 'prueba uploadfile', 'felipe camacho', 'informatica', 'Primero', 'felipecamachoprimero/PSC1.jpg', 'liceo'),
(3, 'prueba uploadfile', 'felipe camacho', 'informatica', 'Primero', 'felipecamachoprimero/eltabernaculotomo2.pdf', 'liceo'),
(4, 'prueba uploadfile4', 'felipe camacho', 'prejardín', 'primero', 'felipecamachoprimero/Directriz...pdf', 'liceo'),
(5, 'prueba uploadfile5', 'felipe camacho', 'informatica', 'prejardín', 'felipecamachoprejardin/INSTRUCTI...pdf', 'liceo'),
(6, 'prueba uploadfile6', 'felipe camacho', 'informatica', 'prejardín', 'felipecamachoprejardin/ELPROXIMOESCENARIOGLOBAL(re', 'liceo'),
(13, 'prueba uploadfile4', 'felipe camacho', 'informatica', 'prejardín', 'felipecamachoprejardin/1ercapitulodecomollegolaBib', 'liceo'),
(12, 'trabajo', 'felipe camacho', 'informatica', 'prejardín', 'felipecamachoprejardin/PSC1.jpg', 'liceo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--
-- Creación: 10-02-2011 a las 21:53:08
-- Última actualización: 10-02-2011 a las 21:56:02
--

DROP TABLE IF EXISTS `archivos`;
CREATE TABLE IF NOT EXISTS `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `archivo` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=52 ;

--
-- Volcar la base de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `titulo`, `archivo`) VALUES
(28, 'Nuestros Tiempos Eventos', 'Nuestro Tiempos Eventos.pdf'),
(27, 'Nuestros Tiempos Lo Nuevo', 'Nuestros Tiempos Lo Nuevo.pdf'),
(14, 'Carta Rectora', 'Carta Rector.pdf'),
(26, 'Nuestros Tiempos Editorial', 'Nuestros Tiempos Editorial.pdf'),
(42, 'ANTEPROYECTO FERIA DE LA CIENCIA PRIMARIA ', 'Science fair primaria.pdf'),
(25, 'Nuestros Tiempos presentacion', 'Nuestro Tiempos Presentacion.pdf'),
(43, 'HOMEWORK  FIRST GRADE', 'HOMEWORK FIRST GRADE.pdf'),
(41, 'Menu Enero ', 'Menu escolar Enero .pdf'),
(40, 'Horario III Periodo Noveno', 'NOVENO.pdf'),
(39, 'Horario III Periodo Octavo ', 'OCTAVO.pdf'),
(38, 'Horario III Periodo Septimo', 'SEPTIMO.pdf'),
(37, 'Horario III Periodo Sexto', 'SEXTO.pdf'),
(35, 'Horario III Periodo Cuarto', 'CUARTO.pdf'),
(36, 'Horario III Periodo Quinto', 'QUINTO.pdf'),
(29, 'Nuestros Tiempos Deportes', 'Nuestros Tiempos Deportes.pdf'),
(30, 'Nuestros Tiempos Clasificados', 'Nuestros Tiempos Clasificados.pdf'),
(31, 'Nuestros Tiempos Social', 'Nuestros Tiempos Social.pdf'),
(34, 'Horario III Periodo Tercero', 'TERCERO.pdf'),
(32, 'HORARIO III PERIODO PRIMERO', 'PRIMERO.pdf'),
(33, 'Horario III Periodo Segundo', 'SEGUNDO.pdf'),
(44, 'HOMEWORK SECOND GRADE', 'HOMEWORK SECOND GRADE.pdf'),
(45, 'HOMEWORK THIRD GRADE', 'HOMEWORK THIRD GRADE.pdf'),
(46, 'HOMEWORK FOURTH GRADE', 'HOMEWORK FOURTH GRADE.pdf'),
(47, 'HOMEWORK  FIFTH GRADE', 'HOMEWORK FIFTH GRADE.pdf'),
(48, 'HOMEWORK SIXTH GRADE', 'HOMEWORK SIXTH GRADE.pdf'),
(49, 'HOMEWORK SEVENTH GRADE', 'HOMEWORK SEVENTH GRADE.pdf'),
(50, 'HOMEWORK EIGHTH GRADE', 'HOMEWORK EIGHTH GRADE.pdf'),
(51, 'HOMEWORK  NINTH GRADE ', 'HOMEWORK NINTH GRADE.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--
-- Creación: 10-02-2011 a las 21:53:08
-- Última actualización: 10-02-2011 a las 21:53:08
--

DROP TABLE IF EXISTS `boletin`;
CREATE TABLE IF NOT EXISTS `boletin` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `No` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `boletin` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `boletin`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_usr`
--
-- Creación: 10-02-2011 a las 21:53:08
-- Última actualización: 10-03-2011 a las 17:40:29
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `cat_usr`
--

INSERT INTO `cat_usr` (`codigo`, `usuario`, `tipo_usuario`, `clave_acceso`, `correo`, `token`, `activo`) VALUES
(1, 'liceo', 2, '21232f297a57a5a743894a0e4a801fc3', 'gerencia@framesoftsolutions.com', '0', 1),
(3, 'felo', 0, '918923642dc3de0b5ae697fc0630de38', 'fc@cogroup.com.co', '0', 1),
(4, 'tita', 0, '918923642dc3de0b5ae697fc0630de38', 'dianaportiz25@gmail.com', '0', 1),
(6, 'administracion', 2, 'f32dab46ae3db17883bc947cf89dce57', 'administracion@liceoanglocolombiano.edu.co', '0', 1),
(7, 'ciencias', 1, '011d16830c7475644049a5c8f5e50ea6', 'milena.morales@liceoanglocolombiano.edu.co', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--
-- Creación: 10-02-2011 a las 21:53:08
-- Última actualización: 10-02-2011 a las 21:56:02
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `No` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=63 ;

--
-- Volcar la base de datos para la tabla `emails`
--

INSERT INTO `emails` (`codigo`, `No`, `nombre`, `email`) VALUES
(5, '1', 'Manuel Obando', 'm_obando@yahoo.com'),
(17, '11', 'Mario Alberto Marmolejo', 'mmarmol@uniquindio.edu.co'),
(7, '3', 'Maria Teresa Obando ', 'rectoria@liceoanglocolombiano.edu.co'),
(9, '5', 'Juan Felipe Obando ', 'ingles@liceoanglocolombiano.edu.co'),
(14, '10', 'Orlando Garrido', 'gerencia@framesoftsolutions.com'),
(15, '11', 'Clara Cecilia Obando ', 'administracion@liceoanglocolmbiano.edu.co'),
(19, '13', 'Omaira Herrera', 'omahero_384@hotmail.com'),
(53, '44', 'Martha liliana Arias', 'lily19973@hotmail.com'),
(21, '15', 'Jairo Ruiz Giraldo', 'jairoruiz69@hotmail.com'),
(22, '16', 'Alberto Mejia Alvarez', 'roarvez@hotmail.com'),
(23, '17', 'Alba Martinez', 'nixamh623@hotmail.com'),
(24, '18', 'Carlos Eduardo Gomez', 'carloseg@uniquindio.edu.co'),
(25, '19', 'Guillermo Henao', 'gidojs@yahoo.es'),
(26, '20', 'Margarita Henao', 'escuelanangel@hotmail.com'),
(27, '21', 'Juan Carlos Holguin', 'juankhol@yahoo.com'),
(28, '22', 'Laura Gonzalez', 'lauragonzalez@yahoot.com '),
(29, '23', 'Katherine Roman', 't_a_t_y@hotmail.com'),
(30, '24', 'Jose Edimer Garay', 'ggagosi@hotmail.com'),
(31, '25', 'Elcy Valdes', 'elcyvalme@hotmail.com'),
(32, '26', 'Gabriel Lozano', 'gablosan7@gmail.com'),
(33, '27', 'Ximena Lopez', 'ximelosan03@hotmail.com'),
(34, '28', 'Monica Martinez', 'monica.martinez@andinautos.com.co'),
(35, '29', 'Margarita Maria Urina', 'mmurina@hotmail.com'),
(36, '30', 'Diana Yolanda Navarro', 'dinanavarro20@hotmail.com'),
(37, '31', 'Jose Luis Sanchez', 'nixamh623@hotmail.com'),
(38, '32', 'Indira Vanegas Bolivar', 'indira.vanegas@gmail.com'),
(39, '33', 'Aracely Restrepo', 'ararespreto@hotmail.es'),
(40, '34', 'Ana Milena Hoyos Molina', 'mile2666@hotmail.com'),
(41, '35', 'Claudia Ximena Lopez', 'ximenalosan03@hotmail.com'),
(42, '36', 'Luz Stella Hernandez', 'stelita222@hotmail.com'),
(44, '37', 'Dora Ines Osorio', 'doraiosorio@hotmail.com'),
(46, '38', 'Carolina Zuluaga', 'carol8128@hotmail.com'),
(47, '39', 'Adriana del Pilar Saavedra', 'pilisaa@yahoo.com'),
(48, '40', 'Natalia Cardona', 'nataliacardonatrejo@hotmail.com'),
(49, '41', 'Mario Alberto Marmolejo', 'mmarmol@unquindio.edu.co'),
(50, '42', 'Monica Martinez', 'monica.martinez@andinautos.com.co'),
(51, '43', 'Jose Luis Mosquera', 'ingjmosquera@hotmail.com'),
(52, '44', 'Maria Praenza Ruiz', 'maprarui@yahoo.es'),
(54, '45', 'alfonso rojas', 'Rojasalf@hotmail.com'),
(55, '46', 'Mario Alberto Tobon', 'mabetobike@hotmail.com'),
(56, '47', 'Luis Mario Zuluaga ', 'fincaalejandria@yahoo.com'),
(57, '48', 'Paola Guzman ', 'paovago@hootmail.com'),
(59, '50', 'Gloria Grajales ', 'glograri1307@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profileusuario`
--
-- Creación: 16-02-2011 a las 07:11:02
-- Última actualización: 11-03-2011 a las 17:07:43
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `profileusuario`
--

INSERT INTO `profileusuario` (`codigo`, `nombre`, `apellidos`, `correo`, `creado`, `ultimo_acceso`, `ultima_actualizacion_notas`, `ENB`, `VTB`, `EB`, `IPLE`, `LPE`, `EPE`, `SFIG`, `VFIG`, `EFIG`, `EMUB`, `SFP`, `MU`) VALUES
(1, 'liceo', 'admin', 'gerencia@liceoanglocolombiano.edu.co', '2011-02-10 00:00:00', '2011-03-11 17:05:01', '0000-00-00 00:00:00', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(3, 'Felipe', 'Camacho', 'fc@cogroup.com.co', '2011-02-27 16:09:45', '2011-03-03 20:21:07', '0000-00-00 00:00:00', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'Y', 'N'),
(4, 'Diana', 'Ortiz', 'dianaportiz25@gmail.com', '2011-03-04 01:08:14', '2011-03-03 20:35:35', '0000-00-00 00:00:00', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'Y', 'N'),
(6, 'Clara Cecilia', 'Obando Posada', 'administracion@liceoanglocolombiano.edu.co', '2011-03-10 17:01:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'Y'),
(7, 'Yoana Milena', 'Morales', 'milena.morales@liceoanglocolombiano.edu.co', '2011-03-10 17:29:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'Y', 'N');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

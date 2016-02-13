-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-02-2011 a las 20:34:13
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE DATABASE IF NOT EXISTS liceoan_anglo COLLATE=latin1_spanish_ci;
USE liceoan_anglo;

--
-- Base de datos: `liceoan_anglo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--
-- Creación: 10-02-2011 a las 20:32:34
-- Última actualización: 10-02-2011 a las 20:32:36
-- Última revisión: 10-02-2011 a las 20:33:19
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `archivo` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 COLLATE=latin1_spanish_ci ;

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
-- Creación: 10-02-2011 a las 20:32:34
-- Última actualización: 10-02-2011 a las 20:32:34
-- Última revisión: 10-02-2011 a las 20:33:09
--

CREATE TABLE IF NOT EXISTS `boletin` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `No` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `boletin` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 COLLATE=latin1_spanish_ci ;

--
-- Volcar la base de datos para la tabla `boletin`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_usr`
--
-- Creación: 10-02-2011 a las 20:32:34
-- Última actualización: 10-02-2011 a las 20:33:19
-- Última revisión: 10-02-2011 a las 20:33:19
--

CREATE TABLE IF NOT EXISTS `cat_usr` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `clave_acceso` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `token` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 COLLATE=latin1_spanish_ci ;

--
-- Volcar la base de datos para la tabla `cat_usr`
--

INSERT INTO `cat_usr` (`codigo`, `usuario_admin`, `clave_acceso`, `correo`, `token`) VALUES
(1, 'liceo', '21232f297a57a5a743894a0e4a801fc3', 'gerencia@framesoftsolutions.com', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--
-- Creación: 10-02-2011 a las 20:32:34
-- Última actualización: 10-02-2011 a las 20:32:36
-- Última revisión: 10-02-2011 a las 20:33:19
--

CREATE TABLE IF NOT EXISTS `emails` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `No` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 COLLATE=latin1_spanish_ci ;

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
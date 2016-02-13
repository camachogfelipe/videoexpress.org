-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-03-2011 a las 12:14:29
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `redlibr_redlibreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--
-- Creación: 08-03-2011 a las 12:13:40
-- Última actualización: 08-03-2011 a las 12:13:40
-- Última revisión: 08-03-2011 a las 12:13:40
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` bigint(255) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('L','CD','M') CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT 'L',
  `titulo` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `autor` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `editorial` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `paginas` int(4) NOT NULL,
  `tipo_caratula` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `size` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `precio_oficial` float NOT NULL,
  `resena` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `categoria_general` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `categoria_especifica` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `imagen_caratula` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `en_promocion` varchar(2) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `precio_promocion` float DEFAULT NULL,
  `articulo_promocion` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `id` (`titulo`,`autor`,`editorial`,`categoria_general`,`categoria_especifica`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `articulos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--
-- Creación: 08-03-2011 a las 12:10:52
-- Última actualización: 08-03-2011 a las 12:10:52
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cedula` bigint(20) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `celular` bigint(10) NOT NULL,
  `correo` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `ciudad` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `pais` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `notired` enum('N','Y') CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`cedula`),
  FULLTEXT KEY `nombre` (`nombre`,`apellidos`,`direccion`,`correo`,`ciudad`,`pais`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `clientes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--
-- Creación: 08-03-2011 a las 12:10:52
-- Última actualización: 08-03-2011 a las 12:10:52
--

CREATE TABLE IF NOT EXISTS `datos` (
  `ultima_actualizacion` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `datos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--
-- Creación: 08-03-2011 a las 12:10:52
-- Última actualización: 08-03-2011 a las 12:10:52
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_factura` bigint(255) unsigned NOT NULL AUTO_INCREMENT,
  `id_comprador` bigint(255) NOT NULL,
  `articulos` varchar(1000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cantidades` varchar(1000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `precios_unitarios` varchar(1000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `total` float NOT NULL,
  `fecha_emision` datetime NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pedidos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_admin`
--
-- Creación: 08-03-2011 a las 12:10:52
-- Última actualización: 08-03-2011 a las 12:10:53
--

CREATE TABLE IF NOT EXISTS `usuarios_admin` (
  `nombre_completo` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `usuario_admin` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `token` int(150) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuarios_admin`
--

INSERT INTO `usuarios_admin` (`nombre_completo`, `usuario_admin`, `password`, `correo`, `token`) VALUES
('Manuel Obando', 'webmaster', '683e8fd555bedb9ec6d905a23954bab1', 'webmaster@redlibreriacristiana.org', 0),
('Administrador', 'admin', '683e8fd555bedb9ec6d905a23954bab1', 'notasflet@etb.net.co', 0);

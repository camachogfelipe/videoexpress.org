-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2011 a las 14:13:50
-- Versión del servidor: 5.1.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `C274400_fslibertad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayudas`
--

DROP TABLE IF EXISTS `ayudas`;
CREATE TABLE IF NOT EXISTS `ayudas` (
  `ID_Ayuda` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_solicitud` enum('SA','OA') COLLATE utf8_spanish_ci NOT NULL,
  `Nombres` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_ayuda` enum('D','V','B','O','AD','NA') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NA',
  `Telefono` int(12) NOT NULL,
  `Celular` int(12) NOT NULL,
  `Ciudad` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Pais` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `Asunto` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_solicitud` datetime NOT NULL,
  `Estado` enum('NP','P') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NP',
  PRIMARY KEY (`ID_Ayuda`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para guardar información de ayudas enviadas por web' AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `ayudas`
--

INSERT INTO `ayudas` (`ID_Ayuda`, `Tipo_solicitud`, `Nombres`, `Correo`, `Tipo_ayuda`, `Telefono`, `Celular`, `Ciudad`, `Pais`, `Asunto`, `Fecha_solicitud`, `Estado`) VALUES
(1, 'SA', 'fafdfdfadf', 'robertopradah@yahoo.com', 'NA', 2147483647, 2147483647, 'bogota', 'col', 'prueba eryeyeyeryr wryeuetueture', '2011-06-23 17:24:09', 'NP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
CREATE TABLE IF NOT EXISTS `colaboradores` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Creado` datetime NOT NULL,
  `Usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_colaborador`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Colaboradores en la Fundación' AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id_colaborador`, `Nombre`, `Creado`, `Usuario`) VALUES
(1, 'Cindy Pereira: Directora APNOP', '2011-06-10 10:09:12', 'Administrador Portal'),
(2, 'Lig&iacute;a de Mendoza: Pastora', '2011-06-10 10:31:13', 'Administrador Portal'),
(3, 'German Montes: Presidente AVANCE Organizacional', '2011-06-10 10:31:33', 'Administrador Portal'),
(4, 'Esteban Prada: Tenor / Director 14C', '2011-06-10 10:31:48', 'Administrador Portal'),
(5, 'Rolando Rinc&oacute;n: Director Cristo par la Ciudad Bogot&aacute;', '2011-06-10 10:32:24', 'Administrador Portal'),
(6, 'Manuel Obando: Gerente Video Express', '2011-06-10 10:32:42', 'Administrador Portal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

DROP TABLE IF EXISTS `editoriales`;
CREATE TABLE IF NOT EXISTS `editoriales` (
  `ID_editorial` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Texto` text COLLATE utf8_spanish_ci NOT NULL,
  `Ultima_actualizacion` datetime NOT NULL,
  `Usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_editorial`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de editoriales' AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`ID_editorial`, `Titulo`, `Texto`, `Ultima_actualizacion`, `Usuario`) VALUES
(1, 'Un cambio de paradigma.', '<p style="text-align: justify;">El pasado 29 de mayo en el peri&oacute;dico El Tiempo, se public&oacute; un an&aacute;lisis titulado as&iacute;: &ldquo;Un cambio de <strong>paradigma</strong>&rdquo;, donde se explicaba que el actual Presidente de la corte constitucional se&ntilde;ala que <strong><em>&ldquo;la carta del 91 se cerr&oacute; en un foro democr&aacute;tico, abierto, representativo, deliberativo y ante todo pluralista&rdquo;, sin antecedentes SIC.</em></strong></p>\r\n<p style="text-align: justify;">Hoy celebramos 20 a&ntilde;os de la constituci&oacute;n pol&iacute;tica de 1991, y dentro del an&aacute;lisis los autores dicen que &ldquo;El derecho es la gram&aacute;tica del poder&rdquo;, porque para&nbsp;nosotros (dicen los autores) las palabras tienen un significado especial: Nos gobiernan.</p>\r\n<p style="text-align: justify;">No hay nada m&aacute;s cierto que esto. Pero nosotros como naci&oacute;n todav&iacute;a pensamos y creemos que son las palabras <span style="text-decoration: underline;">que digan nuestros dirigentes,</span> son esas palabras las que nos permitir&aacute;n vivir en una sociedad libre, estable, pac&iacute;fica y equilibrada, y el argumento es que cuando no hay libertad, paz, y justicia social es porque los dirigentes pol&iacute;ticos no cumplen su palabra.&nbsp;</p>\r\n<p style="text-align: justify;">Las palabras de cada uno de nosotros&nbsp; son las que <strong>SI nos gobiernan</strong>, son ellas las que rigen el destino de cada uno de nosotros, de nuestras familias y porque no de nuestra naci&oacute;n. Conforme a las palabras que se han pronunciado se &nbsp;desarrollan los hechos. Cuando &eacute;stos hombres lo dijeron, sucedieron acontecimientos que a&uacute;n hoy nos abordan:</p>\r\n<p style="text-align: justify;"><em>Es indudable que los jud&iacute;os son una raza pero no son humanos. </em>Adolf Hitler.<br />Luego de esto se desat&oacute; la persecuci&oacute;n m&aacute;s azarosa,&nbsp; tremenda, tan aterradora que com&uacute;nmente la llamamos El Holocausto.</p>\r\n<p style="text-align: justify;"><em>El mercado no es un invento del capitalismo. Siempre ha existido. Es un invento de la civilizaci&oacute;n. Mija&iacute;l Gorbachov.<br /></em>Luego de esto decidi&oacute; abrir la cortina de hierro y lanzar a la URSS al mercado del capitalismo.</p>\r\n<p style="text-align: justify;"><em>La unidad de nuestros pueblos no es simple quimera de los hombres, sino inexorable decreto del destino. Sim&oacute;n Bol&iacute;var.<br /></em>Luego de esto logr&oacute; la libertad y la unidad de varios pueblos&nbsp; Colombia (Panam&aacute; hac&iacute;a parte de Colombia en ese entonces) Venezuela y Ecuador.</p>\r\n<p style="text-align: justify;"><em>Un estado en el que coexisten la libertad y la esclavitud no puede perdurar. Abraham Lincoln.&nbsp; </em>Luego de esto logr&oacute; abolir la esclavitud en Norteam&eacute;rica.</p>\r\n<p style="text-align: justify;"><strong><em>Consumado es. Jes&uacute;s de Nazaret.</em></strong><br />Luego de esto se rasg&oacute; el velo en el templo y para toda la humanidad se abri&oacute; el camino al Padre Celestial a trav&eacute;s de Cristo.</p>\r\n<p style="text-align: justify;">T&uacute; est&aacute;s todav&iacute;a esperando &ldquo;Un cambio de <strong>paradigma</strong>&rdquo;, que la carta magna de una naci&oacute;n, sea la que te conduzca al camino de la Libertad.&nbsp; Tu libertad est&aacute; sobre ti, s&oacute;lo cuando pronuncies y digas al &uacute;nico Dios de Amor, tus palabras de libertad:&nbsp;&nbsp; <strong>Jes&uacute;s&nbsp; te abro la puerta de mi vida, te acepto como&nbsp;&nbsp;mi Se&ntilde;or y Mi Salvador. Te necesito en mi vida.</strong></p>\r\n<p style="text-align: justify;">Eso s&iacute; es un cambio de <strong>paradigma.</strong></p>\r\n<p style="text-align: justify;">Junio 01 de 2011</p>\r\n<p style="text-align: justify;">Colaboraci&oacute;n de Manuel Obando para Fundaci&oacute;n Semillas de Libertad.</p>', '2011-06-03 13:39:29', 'Administrador Portal'),
(2, 'LEY 1287 DE 2009', '<p>EL CONGRESO DE COLOMBIA</p>\r\n<p>DECRETA:</p>\r\n<p>CAPITULO I.</p>\r\n<p>DE LAS DEFINICIONES.<strong> </strong></p>\r\n<p>ART&Iacute;CULO 1o. <em>DEFINICIONES</em>. Para efectos de la adecuada comprensi&oacute;n y aplicaci&oacute;n de la presente ley se establecen las siguientes definiciones:</p>\r\n<p><strong>Bah&iacute;as de estacionamiento: </strong>Parte complementaria de la estructura de la v&iacute;a utilizada como zona de transici&oacute;n entre la calzada y el and&eacute;n destinada al estacionamiento de veh&iacute;culos.</p>\r\n<p><strong>Movilidad reducida: </strong>Es la restricci&oacute;n para desplazarse que presentan algunas personas debido a una discapacidad o que sin ser discapacitadas presentan alg&uacute;n tipo de limitaci&oacute;n en su capacidad de relacionarse con el entorno al tener que acceder a un espacio o moverse dentro del mismo, salvar desniveles, alcanzar objetos situados en alturas normales.</p>\r\n<p><strong>Accesibilidad: </strong>Condici&oacute;n que permite, en cualquier espacio o ambiente ya sea interior o exterior, el f&aacute;cil y seguro desplazamiento de la poblaci&oacute;n en general y el uso en forma confiable, eficiente y aut&oacute;noma de los servicios instalados.</p>\r\n<p>CAPITULO II.</p>\r\n<p>DE LAS BAH&Iacute;AS DE ESTACIONAMIENTO.<strong> </strong></p>\r\n<p>ART&Iacute;CULO 2o. Autor&iacute;cese el parqueo de veh&iacute;culos en las bah&iacute;as de estacionamiento definidas por la Ley <a href="http://www.secretariasenado.gov.co/senado/basedoc/ley/2002/ley_0769_2002.html#1" target="_blank">769</a> del 2002 a las personas con movilidad reducida, ya sean conductores o acompa&ntilde;antes.</p>\r\n<p>PAR&Aacute;GRAFO. Las autoridades municipales y distritales competentes habilitar&aacute;n y reglamentar&aacute;n en beneficio de las personas con movilidad reducida el uso de las bah&iacute;as de estacionamiento. Por el uso de las bah&iacute;as se podr&aacute;n cobrar las tarifas legalmente establecidas.</p>\r\n<p>ART&Iacute;CULO 3o. Con el fin de garantizar la movilidad de las personas con movilidad reducida, las autoridades municipales y distritales autorizar&aacute;n la construcci&oacute;n de las bah&iacute;as de estacionamiento y dispondr&aacute;n en los sitios donde ellas existan, as&iacute; como en los hospitales, cl&iacute;nicas, instituciones prestadoras de salud, instituciones financieras, centros comerciales, supermercados, empresas prestadoras de servicios p&uacute;blicos domiciliarios, parques, unidades residenciales, nuevas urbanizaciones, edificaciones destinadas a espect&aacute;culos p&uacute;blicos, unidades deportivas, autocinemas, centros educativos, edificios p&uacute;blicos y privados, de sitios de parqueo debidamente se&ntilde;alizados y demarcados para personas con alg&uacute;n tipo de discapacidad y/o movilidad reducida, o cuya capacidad de orientaci&oacute;n se encuentre disminuida por raz&oacute;n de la edad o enfermedad, con las dimensiones internacionales en un porcentaje m&iacute;nimo equivalente al dos por ciento (2%) del total de parqueaderos habilitados. En ning&uacute;n caso podr&aacute; haber menos de un (1) espacio habilitado, debidamente se&ntilde;alizado con el s&iacute;mbolo internacional de accesibilidad, de conformidad con lo establecido en el Decreto 1660 del 2003.</p>\r\n<p>PAR&Aacute;GRAFO. Para los efectos previstos en este art&iacute;culo, se considera que una persona se encuentra disminuida en su capacidad de orientaci&oacute;n por raz&oacute;n de la edad, cuando tenga o exceda los sesenta y cinco (65) a&ntilde;os.</p>', '2011-06-23 16:18:42', 'Administrador Portal'),
(3, 'Todo lo puedo en Cristo', '<p><img title="Dando mensaje de fortaleza" src="../archivos_apoyo/Foto-0001.jpg" alt="Mateo" width="100" height="133" /> Ense&ntilde;ando car&aacute;cter y fortaleza en Cristo.</p>', '2011-06-23 16:27:31', 'Administrador Portal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fundadores`
--

DROP TABLE IF EXISTS `fundadores`;
CREATE TABLE IF NOT EXISTS `fundadores` (
  `id_fundador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `Experiencia` text COLLATE utf8_spanish_ci NOT NULL,
  `Ultima_actualizacion` datetime NOT NULL,
  `Usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_fundador`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `fundadores`
--

INSERT INTO `fundadores` (`id_fundador`, `Nombre`, `Perfil`, `Experiencia`, `Ultima_actualizacion`, `Usuario`) VALUES
(1, 'Gilberto Enrique Castilla Solano', '<ul>\r\n<li>Economista</li>\r\n<li>Especializaci&oacute;n en An&aacute;lisis de Proyectos de Inversi&oacute;n</li>\r\n<li>Especializaci&oacute;n en Alta Gerencia en Seguridad Social</li>\r\n<li>Especializaci&oacute;n en Liderazgo y Democracia</li>\r\n</ul>', '<ul>\r\n<li>Ministro plenipotenciario de la embajada de colombia en Veneuela</li>\r\n<li>Secretario general del Ministerio de Desarrollo</li>\r\n<li>Viceministro de trabajo</li>\r\n<li>Director de transito en Santander</li>\r\n</ul>', '2011-05-25 12:55:23', 'Administrador portal'),
(2, 'Roberto Ismael Prada Hernandez', '<ul>\r\n<li>Ingeniero industrial con enfasis en Mercadeo, Ventas, Formaci&oacute;n, Capacitaci&oacute;n y Coaching</li>\r\n<li>Consultor conferencista en direccionamiento estrat&eacute;gico, direcci&oacute;n gerencial, desarrollo corporativo y procesos formativos.</li>\r\n<li>Pastor de Iglesia local hasta el 2010 ense&ntilde;ando principios b&iacute;blicos en los diferentes escenarios, para tener vidas transformadas y exitosas</li>\r\n</ul>', '<ul>\r\n<li>Consultor y conferencista de Avance Organizacional Consultores</li>\r\n<li>Pastor Iglesia Carism&aacute;tica Cuadrangular en Bucaramanga y luego en Bogot&aacute; - Fontibon</li>\r\n<li>Gerente outosourcing Unisys de colombia</li>\r\n<li>Director divisi&oacute;n tarjeta debito Banco del Estado</li>\r\n<li>Gerente comercial Recursos Ltda.</li>\r\n</ul>', '2011-05-25 13:21:35', 'Administrador portal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_gral`
--

DROP TABLE IF EXISTS `informacion_gral`;
CREATE TABLE IF NOT EXISTS `informacion_gral` (
  `ID_seccion` int(1) NOT NULL,
  `Subseccion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `Titulo` varchar(1000) COLLATE latin1_spanish_ci NOT NULL,
  `Texto` text COLLATE latin1_spanish_ci NOT NULL,
  `Ultima_edicion` datetime NOT NULL,
  `Usuario` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  KEY `ID_seccion` (`ID_seccion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `informacion_gral`
--

INSERT INTO `informacion_gral` (`ID_seccion`, `Subseccion`, `Titulo`, `Texto`, `Ultima_edicion`, `Usuario`) VALUES
(1, 'vision', 'Visi&oacute;n', '<p>Que en la naci&oacute;n las familias vivan en hogares de paz, en habitaciones seguras y que sean lugares de reposo, unidad, amor, prosperidad y luz para las naciones.</p>\r\n<p><span><em>Isa&iacute;as 32: 16-20<br /></em></span></p>', '2011-05-25 11:20:49', ''),
(1, 'mision', 'Misi&oacute;n', '<p>Promover la justicia impulsando el crecimiento integral del Ser Humano y su familia, desarrollando su potencial creativo, con el prop&oacute;sito de generar un nuevo liderazgo renovador y transformador con la Verdad del Reino de Dios.</p><p><em>Romanos 12:1-2</em></p>', '2011-05-19 12:12:20', 'Administrador portal'),
(1, 'proposito', 'Prop&oacute;sito', '<p><object width="550" height="462" data="../archivos_apoyo/proposito.swf" type="application/x-shockwave-flash"><param name="src" value="../archivos_apoyo/proposito.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="wmode" value="transparent" /></object></p>\r\n<p>Vivir en libertad para hacer la voluntad del Se&ntilde;or, desarrollando todo el potencial que Dios ha puesto en nosotros, para que Su Gobierno se cumpla en la tierra, <em>Juan 8:29-32 y Deuteronomio 8</em>, sobre los siguientes fundamentos:</p>\r\n<ul>\r\n<li>Servir. <em>Josue 21:15-16 y Mateo 6:33</em></li>\r\n<li>Impactar. <em>Isa&iacute;as 61, 2 Corintios 5:20</em></li>\r\n<li>Ser personas de fe. <em>Mateo 17:20 y Proverbios 22:4</em></li>\r\n</ul>', '2011-06-24 14:02:17', 'Administrador Portal'),
(1, 'valores', 'Valores', '<p>Nuestros valores se fundamentan en la Palabra de Mateo 5:1-12 y Galatas 5:22-26, como son:</p>\r\n<ul id="trad">\r\n<li>Amor</li>\r\n<li>Humildad</li>\r\n<li>Paciencia</li>\r\n<li>Bondad</li>\r\n<li>Justicia</li>\r\n<li>Compasi&oacute;n</li>\r\n<li>Integridad</li>\r\n<li>Paz</li>\r\n<li>Valent&iacute;a</li>\r\n<li>Alegr&iacute;a</li>\r\n</ul>\r\n<p><object id="flash" width="650" height="488" class="mceItemMedia mceItemFlash" data="../archivos_apoyo/valores.swf" type="application/x-shockwave-flash"><param name="src" value="../archivos_apoyo/valores.swf" /><param name="quality" value="best" /><param name="scale" value="showall" /><param name="wmode" value="transparent" /></object></p>', '2011-06-16 17:33:51', 'Administrador Portal'),
(1, 'objsocial', 'Objeto Social', '<p>La Fundaci&oacute;n Semillas de Libertad impulsa el crecimiento integral del ser humano y el desarrollo de su potencial creativo, con el fin de generar un nuevo liderazgo renovador y transformador influyente en un nuevo marco social y cultural, justo y equitativo que garantice su realizaci&oacute;n personal y plenitud de vida.</p>\r\n<span>Nos inspiramos en el llamado de Jes&uacute;s de amarnos los unos a los otros para promover el camino del amor como &uacute;nica v&iacute;a cierta y segura e impulsamos el desarrollo de la conciencia social a trav&eacute;s de la solidaridad y la generosidad.</span>\r\n<p>Brindamos ayuda integral a familias, fundamentalmente de escasos recursos y/o con dificultades ocasionadas por temas de salud (especialmente discapacidades de nacimiento o resultantes de accidentes, desnutrici&oacute;n y enfermades end&eacute;micas)</p>\r\n<span>Fomentamos el mejoramiento de la calidad de vida y el bienestar colectivo buscando los principios cristianos de: Paz, Felicidad, Prosperidad, Justicia y Bondad.</span>\r\n<p>Damos soporte a trav&eacute;s de programas de educaci&oacute;n y capacitaci&oacute;n, suministro de ayudas en especie, asesor&iacute;a integral tanto a nivel de n&uacute;cleo familiar como en su participaci&oacute;n en las diferentes comunidades.</p>\r\n<span>Nuestro compromiso es garantizar consejer&iacute;a familiar y empresarial, ayuda espiritual y psicosocial, capacitaci&oacute;n en diversos campos y aportes para manejar una econom&iacute;a viable y sostenible y as&iacute; llegar a ser generadores de empresa.</span>', '2011-05-19 12:23:31', 'Administrador portal'),
(1, 'estructuraorganizacional', 'Estructura de influencia', '<p><img style="margin: 5px;" title="estructura" src="../archivos_apoyo/estructura_de_influencia.png" alt="estructura de influeciade la fundacion" width="500" height="409" /></p>', '2011-06-20 16:54:07', 'Administrador Portal'),
(1, 'historia', 'Historia', '<p>La historia de nuestra fundaci&oacute;n se inicia con un sue&ntilde;o en com&uacute;n. <br /> Este es nuestro sue&ntilde;o:<br /> Me alegrar&eacute;, no temer&eacute;, me alegrar&eacute; y me gozar&eacute; porque Jehov&aacute; har&aacute; grandes cosas, milagros, prodigios, lo incre&iacute;ble, lo imposible y lo improbable.<br /> Riquezas, honra y vida, sabidur&iacute;a de lo alto. Abundancia y prosperidad, ll&eacute;nanos de los frutos de tu Esp&iacute;ritu Santo. Amor, gozo, paz, paciencia, benignidad, fa, mansedumbre y templanza. <br /><br /> Prestaremos y nunca pediremos prestado. Seremos cabeza y no cola. Estaremos encima solamente. Comeremos hasta saciarnos y alabaremos el nombre de Jehov&aacute; nuestro Dios. El cual hizo maravillas con nosotros y nunca jam&aacute;s seremos un pueblo avergonzado.<br /><br /> Nos levantaremos y resplandeceremos, porque ha venido tu luz y la gloria de Jehov&aacute; ha nacido sobre nosotros. Sobre nosotros amanecer&aacute; Jehov&aacute; y sobre nosotros ser&aacute; vista su gloria y andar&aacute;n las naciones a nuestra luz y los reyes al resplandor de tu nacimiento.<br /><br /> Veneraremos a Jehov&aacute;, no andando en nuestros propios caminos, ni buscando nuestra voluntad, ni hablando nuestras propias palabras; entonces nos deleitaremos en Jehov&aacute; y el nos har&aacute; subir sobre las alturas de la tierra y nos dar&aacute; a comer la heredad de Jacob, nuestro padre, porque la boca de Jehov&aacute; lo ha dicho. <br /><br /></p>', '2011-05-25 11:31:35', ''),
(1, 'biofundadores', 'Biograf&iacute;a fundadores', '<A name="top">&nbsp;</A>\r\n<br /><br /><span id="titulo_contenido" class="color1">\r\n	<a href="#gilberto">Gilberto Enrique Castilla Solano</a><br />\r\n    <a href="#roberto">Roberto Ismael Prada Hernandez</a>\r\n</span><br /><br />\r\n<span id="gilberto" class="color2">Gilberto Enrique Castilla Solano</span> <a href="#top">Ir arriba</a>\r\n<p>Perfil profesional\r\n	<ul id="trad">\r\n		<li>Economista</li>\r\n        <li>Especializaci&oacute;n en An&aacute;lisis de Proyectos de Inversi&oacute;n</li>\r\n        <li>Especializaci&oacute;n en Alta Gerencia en Seguridad Social</li>\r\n        <li>Especializaci&oacute;n en Liderazgo y Democracia</li>\r\n	</ul>\r\n    <span>Experiencia Laboral</span>\r\n    <ul id="trad1">\r\n    	<li>Ministro plenipotenciario de la embajada de colombia en Veneuela</li>\r\n        <li>Secretario general del Ministerio de Desarrollo</li>\r\n        <li>Viceministro de trabajo</li>\r\n        <li>Director de transito en Santander</li>\r\n    </ul>\r\n</p>\r\n<span id="roberto" class="color1">Roberto Ismael Prada Hernandez</span> <a href="#top">Ir arriba</a>\r\n<p>Perfil profesional\r\n	<ul id="trad2">\r\n    	<li>Ingeniero industrial con enfasis en Mercadeo, Ventas, Formaci&oacute;n, Capacitaci&oacute;n y Coaching</li>\r\n        <li>Consultor conferencista en direccionamiento estrat&eacute;gico, direcci&oacute;n gerencial, desarrollo corporativo y procesos formativos.</li>\r\n        <li>Pastor de Iglesia local hasta el 2010 ense&ntilde;ando principios b&iacute;blicos en los diferentes escenarios, para tener vidas transformadas y exitosas</li>\r\n    </ul>\r\n    <span>Experiencia Laboral</span>\r\n    <ul id="trad3">\r\n    	<li>Consultor y conferencista de Avance Organizacional Consultores</li>\r\n        <li>Pastor Iglesia Carism&aacute;tica Cuadrangular en Bucaramanga y luego en Bogot&aacute; - Fontibon</li>\r\n        <li>Gerente outosourcing Unisys de colombia</li>\r\n        <li>Director divisi&oacute;n tarjeta debito Banco del Estado</li>\r\n        <li>Gerente comercial Recursos Ltda.</li>\r\n    </ul>\r\n</p>', '2011-05-19 12:27:41', 'Administrador portal'),
(1, 'junta', 'Junta Directiva', '<A name="top">&nbsp;</A>\r\n<br /><br /><span id="titulo_contenido" class="color1">\r\n	<a href="#gilberto">Gilberto Enrique Castilla Solano</a><br />\r\n    <a href="#roberto">Roberto Ismael Prada Hernandez</a><br />\r\n    <a href="#Fernando">Fernando Mendoza Ardila</a><br />\r\n    <a href="#Javier">Javier Bolívar Cuadrado</a>   \r\n</span><br /><br />\r\n<span id="gilberto" class="color1">Gilberto Enrique Castilla Solano</span> <a href="#top">Ir arriba</a><br />\r\n<span id="roberto" class="color1">Roberto Ismael Prada Hernandez</span> <a href="#top">Ir arriba</a><br />\r\n<span id="Fernando" class="color1">Fernando Mendoza Ávila</span> <a href="#top">Ir arriba</a><br />\r\n<span id="Javier" class="color1">Fernando Mendoza Ávila</span> <a href="#top">Ir arriba</a><br />', '2011-05-19 12:28:41', 'Administrador portal'),
(2, 'pqtgral', 'Para quien trabajamos', '<p>Se dice que la persona m&aacute;s pobre sobre la faz de la tierra es aquella que no tiene sue&ntilde;os. Cuando el sue&ntilde;o muere, el esp&iacute;ritu humano muere tambi&eacute;n. La tragedia m&aacute;s grande en la vida no es la muerte, sino la vida sin prop&oacute;sito<br /><br /> El prop&oacute;sito es la fuente que da significado para la vida y sirve como el vientre para la concepci&oacute;n de los sue&ntilde;os y da la visi&oacute;n.<br /><br /> Por lo tanto, la injusticia m&aacute;s grande que existe y que puede ser impuesta sobre el esp&iacute;ritu humano es la liquidaci&oacute;n de habilidad para poder so&ntilde;ar y para poder tener alguna visi&oacute;n. La capacidad para so&ntilde;ar es la habilidad para mantenerse con vida. En esencia, el objetivo de tener un prop&oacute;sito es para poder descubrir la esperanza y el tener esperanza nos lleva a so&ntilde;ar y so&ntilde;ar es cultivar una visi&oacute;n y poseer una visi&oacute;n es tener fe. Tener fe es tener una raz&oacute;n para vivir. <br /><br /> En nuestro pa&iacute;s hay millones de personas v&iacute;ctimas de la opresi&oacute;n y supresi&oacute;n. Cientos de a&ntilde;os de colonialismo, dictaduras y de esclavitud los han dejado limitados visualmente, motivados &uacute;nicamente por un esp&iacute;ritu de solo sobrevivir. Ellos solo viven tener una gratificaci&oacute;n inmediata y de d&iacute;a a d&iacute;a. Muchos de ellos no tienen sentido del prop&oacute;sito, no tienen esperanza, no tienen visi&oacute;n y tampoco futuro. <br /><br /> El impacto de la opresi&oacute;n sobre nuestro pueblo ha sido devastadora, ellos han estado experimentado la perdida de la autoestima y de todo sentido de dignidad. Sin embargo la m&aacute;s grande tragedia de la opresi&oacute;n fue la destrucci&oacute;n de la capacidad de so&ntilde;ar y para tener visiones. Por eso es que despu&eacute;s de muchos a&ntilde;os de independencia nacional estamos todav&iacute;a atrapados en la trampa del tiempo, de un comportamiento autodestructivo y no hemos podido salir adelante como naci&oacute;n libre. Por el contrario &nbsp;los rasgos que caracterizan&nbsp; a estos pueblos son: la falta de orgullo nacional, una muy pobre &eacute;tica del trabajo, una cultura de corrupci&oacute;n y la carencia de toda esperanza para ser ciudadanos. Muchos de nuestros l&iacute;deres, la supervivencia, la suspicacia, el status quo, el proteccionismo y la perversi&oacute;n personal, son sus motivaciones principales. Por eso es imperativa la restauraci&oacute;n de su esp&iacute;ritu de visionario y de la capacidad para poder servir. <br /><br /> <strong>Conclusi&oacute;n:</strong><br /><br /> La falta de un liderazgo con visi&oacute;n a contribuido al estado actual de nuestro pueblo. Nuestra esperanza debe ser que en este nuevo siglo que comienza <strong>pueda producir una generaci&oacute;n de l&iacute;deres</strong> que est&eacute;n motivados por esp&iacute;ritu de sentido, de prop&oacute;sito y que ejerciten un liderazgo visionario que inspira confianza en la gente. Necesitamos l&iacute;deres que puedan promover visiones nacionales que a su vez puedan dar reconocimiento a la capacidad de creatividad de la visi&oacute;n personal.<br /><br /> Necesitamos que ejerzan liderazgo, que puedan ver m&aacute;s all&aacute; de las soluciones pragm&aacute;ticas y simplistas y que puedan capturar un visi&oacute;n inspirada por Dios, que interpreten las aspiraciones del pueblo y el derecho que ellos tienen para ir en busca de sus sue&ntilde;os personales y sus visiones. La clave &ldquo;es tener un liderazgo visionario&rdquo;. <br /><br /> Un liderazgo que sea capaz de inspirar, descubrir de ir en busca y poder llegar a cumplir las visiones del coraz&oacute;n. Que pueda llevar al m&aacute;ximo potencial que se encuentra atrapado dentro de las personas. Esa es la verdadera libertad que Dios quiere para sus hijos. Que lleguemos a ser todo lo que el quiere que seamos. <br /><br /> Queremos una naci&oacute;n a la altura de nuestro destino y que seamos ejemplo para el mundo. Para la gloria de nuestro Padre celestial.</p>', '2011-06-01 10:48:46', 'Administrador Portal'),
(2, 'servicios', 'Servicios', '<p>Asesor&iacute;a.<br />Consultor&iacute;a.<br />Consejer&iacute;a de familia.<br />Entrenamiento.<br />Capacitaci&oacute;n.<br />Coordinaci&oacute;n.<br />Liderazgo de procesos.<br />Investigaci&oacute;n.<br />Educaci&oacute;n.</p>', '2011-06-09 13:01:00', 'Administrador Portal'),
(3, 'qhgral', 'Las siete monta&ntilde;as de influencia', '<div>Las siete monta&ntilde;as de influencia</div>\r\n<ul>\r\n<li>El SE&Ntilde;OR te pondr&aacute; a la cabeza, nunca en la cola. Siempre estar&aacute;s en la cima, nunca en el fondo, con tal de que prestes atenci&oacute;n a los mandamientos del SE&Ntilde;OR tu Dios que hoy te mando, y los obedezcas con cuidado. Jam&aacute;s te apartes de ninguna de las palabras que hoy te ordeno, para seguir y servir a otros dioses. &nbsp;Deuteronomio 28:13-14 (NVI)</li>\r\n</ul>\r\n<div>\r\n<ul>\r\n<li>Deu 28:13 El Se&ntilde;or te pondr&aacute; al frente, no detr&aacute;s. Siempre estar&aacute;s arriba, nunca abajo, con tal que obedezcas los mandamientos del Se&ntilde;or, tu Dios, que hoy te ordeno practicar cuidadosamente,</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<ul>\r\n<li>Deu 28:14 sin apartarte, ni a la derecha ni a la izquierda, de las palabras que hoy te prescribo, y sin ir detr&aacute;s de otros dioses para servirlos. (LPD)</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<ul>\r\n<li>Deu 28:13 El Se&ntilde;or te har&aacute; ir a la cabeza, no al final; siempre estar&aacute;s en la cima y no en el fondo. Esto suceder&aacute; si t&uacute; escuchas los mandamientos que el Se&ntilde;or tu Dios te manda hoy y los obedeces cuidadosamente.</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<ul>\r\n<li>Deu 28:14 Ser&aacute;s bendito si sigues sin apartarte de ninguna de las palabras que te ordeno, ni vas tras otros dioses para servirles.</li>\r\n</ul>\r\n<div>Debemos entender los roles que desempe&ntilde;an los Hijos de Dios, como reyes y sacerdotes y el ejercicio de su influencia en cada esfera de la cultura en la que se desenvuelve.</div>\r\n<div>Debemos comprender los &aacute;mbitos de autoridad y gobierno que rigen en la tierra, en la cultura y esta autoridad sometida a la autoridad de Dios y su Reino.</div>\r\n</div>\r\n<p style="text-align: center;"><a href="../index2.php?op=3&amp;s=6"><img style="margin-top: 5px; margin-bottom: 5px; float: left;" title="montana_arte" src="../imagenes/ic_monta%f1as-%a1arte.png" alt="logo" width="130" height="187" /></a><a href="http://www.fslibertad.org/index2.php?op=3&amp;s=4"><img style="margin-top: 5px; margin-bottom: 5px; float: left;" title="montana_educaion" src="../imagenes/ic_monta%f1as-educaion.png" alt="logo" width="130" height="190" /></a><img style="margin-top: 5px; margin-bottom: 5px;" title="montana_negocios" src="../imagenes/ic_monta%f1as-negocios.png" alt="logo" width="130" height="190" /><img style="margin-top: 5px; margin-bottom: 5px;" title="montana_familia" src="../imagenes/ic_monta%f1as-familia.png" alt="logo" width="130" height="187" /><img style="margin-top: 5px; margin-bottom: 5px;" title="montana_gobierno" src="../imagenes/ic_monta%f1as-gobierno.png" alt="logo" width="130" height="187" /><img style="margin-top: 5px; margin-bottom: 5px;" title="montana_iglesia" src="../imagenes/ic_monta%f1as-iglesia.png" alt="logo" width="130" height="187" /><img style="margin-top: 5px; margin-bottom: 5px;" title="montana_comunicacion" src="../imagenes/ic_monta%f1as-comunicaciones.png" alt="logo" width="130" height="187" /></p>', '2011-06-23 16:52:18', 'Administrador Portal'),
(5, 'donaciones', 'Donaciones', '<p>Cuenta Helm Bank</p>\r\n<p>Ahorros No. 013042199<br /> Nombre de la cuenta: Fundaci&oacute;n Semillas de Libertad<br /> Nit. 900.388.711-9</p>\r\n<p>Si requiere apoyo t&eacute;cnico comun&iacute;quese con el banco al n&uacute;mero 581 8181 en Bogot&aacute; &oacute; al n&uacute;mero 01800 512 633 en el resto del pa&iacute;s.</p>', '2011-06-01 12:09:08', 'Administrador Portal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `junta`
--

DROP TABLE IF EXISTS `junta`;
CREATE TABLE IF NOT EXISTS `junta` (
  `id_miembro` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `Ultima_actualizacion` datetime NOT NULL,
  `Usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_miembro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `junta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
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
  `Ultima_actualizacion` datetime NOT NULL,
  `Usuario` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proyecto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Proyectos de como vamos' AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyecto`, `monte`, `nombre`, `fecha_inicio`, `fecha_final`, `ultima_actividad`, `donde`, `quienes`, `personas_impactadas`, `fotos`, `logo_proyecto`, `descripcion`, `video`, `inversion_pesos`, `inversion_dolares`, `Ultima_actualizacion`, `Usuario`) VALUES
(1, 'iglesia', 'Iglesia al SUR', '2011-04-27', '0000-00-00', '<p>Definici&oacute;n y creaci&oacute;n del proyecto</p>', 'Iglesia Cuadrangular de Fontib&oacute;n', 'Equ&iacute;po de pastores, Igles&iacute;a Infantil, Cuerpo M&eacute;dico, Odontologos voluntarios', 320, '', 'icono_iglesia.png', '<p>Proyecto de prueba para demostraci&oacute;n de la secci&oacute;n en que vamos.</p>', '', 2500000, 1000, '2011-06-10 11:05:49', 'Administrador Portal'),
(2, 'aye', 'Grupo musical', '2011-01-30', '0000-00-00', '<p>Conciertos de m&uacute;sica GOSPEL al Norte de Bogot&aacute;</p>', 'Conciertos a lo largo de Bogot&aacute;', 'Esteban Prada guitarrista, Juan Me&eacute;dez Vocalista, Andrea J&iacute;menez al piano', 200, '', '', '<p>Se est&aacute;n haciendo conciertos de m&uacute;sica en las diferentes Iglesias del Norte de la cuidad, cada 15 d&iacute;as. Estamos abarcando este grupo esp&eacute;cifico de la poblacion para mostarles que la diversi&oacute;n sana en la m&uacute;sica si es posible. </p>', '', 2000000, 1100, '2011-06-10 11:22:02', 'Administrador Portal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `que_hacemos`
--

DROP TABLE IF EXISTS `que_hacemos`;
CREATE TABLE IF NOT EXISTS `que_hacemos` (
  `ID_seccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Titulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Coordinador` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Dream` text COLLATE utf8_spanish_ci NOT NULL,
  `Ultima_edicion` datetime NOT NULL,
  `Usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_seccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `que_hacemos`
--

INSERT INTO `que_hacemos` (`ID_seccion`, `Titulo`, `Coordinador`, `Descripcion`, `Dream`, `Ultima_edicion`, `Usuario`) VALUES
('aye', 'Arte y Entretenimiento', 'Esteban Prada                    ', '<p>Email: <a href="mailto:e.prada@fslibertad.org" target="_blank"><span style="color: #0000ff;"><strong>e.prada@fslibertad.org</strong></span></a></p>\r\n<p><img style="margin: 10px; float: left;" title="montana_arte" src="../imagenes/ic_monta%f1as-%a1arte.png" alt="logo" width="185" height="266" /></p>\r\n<p>El Arte y el Entretenimiento debe reflejar la gloria y la majestad de nuestro creador. Podemos ser instrumentos para celebrar su creatividad en las artes, m&uacute;sica, deportes, moda, entrete', '<p><strong><span style="color: #800000;">Crear un instituto art&iacute;sitco de alto impacto.</span></strong></p>\r\n<blockquote>\r\n<ul>\r\n<li><span style="font-family: comic sans ms,sans-serif;">Ense&ntilde;ar a personas en condici&oacute;n de discapacidad.</span></li>\r\n<li><span style="font-family: comic sans ms,sans-serif;">Formar ni&ntilde;os de bajos recursos y crear diferentes grupos de expresi&oacute;n art&iacute;stica.</span></li>\r\n<li><span style="font-family: comic sans ms,sans-serif;">Emplear las artes como contribuci&oacute;n a la soluci&oacute;n de conflictos.</span></li>\r\n<li><span style="font-family: comic sans ms,sans-serif;">Hacer consultor&iacute;as y coaching empleando las artes.</span></li>\r\n</ul>\r\n</blockquote>', '2011-06-24 13:41:02', 'Administrador Portal'),
('eyn', 'Econom&iacute;a y Negocios', 'German Montes', '<p><img style="margin: 10px; float: left;" title="montana_negocios" src="../imagenes/ic_monta%f1as-negocios.png" alt="logo" width="185" height="270" />Los negocios est&aacute;n concebidos como lugar de Adoraci&oacute;n a Dios, de acuerdo a el &aacute;rea del llamado que cada persona ha recibido. All&iacute; podremos mostrar la integridad, el servicio y disponer de los dones que Dios nos ha dado para extender Su reino.</p>', '<p><strong><span style="color: #993300;">Establecer una red de empresarios integros.</span></strong></p>\r\n<blockquote>\r\n<ul>\r\n<li>Compartir a nivel empresarial la importancia de hacer negocios en integridad, como &uacute;nica forma de acabar con la ruina del pa&iacute;s.</li>\r\n<li>Hacer capacitaci&oacute;n transformadora en las empresas, para vivir libres financieramente.</li>\r\n<li>Apoyar todas las otras esferas de acci&oacute;n. Haciendo negocios.</li>\r\n</ul>\r\n</blockquote>', '2011-06-20 16:57:33', 'Administrador Portal'),
('educacion', 'Educaci&oacute;n', 'Roberto Ismael Prada Hernandez', '<p><img style="float: left; margin: 10px;" title="montana_economia" src="../imagenes/ic_monta%f1as-educaion.png" alt="logo" width="185" height="270" />La educaci&oacute;n debe reflejar la verdad acerca de Dios y el hombre que nos hace libres.&rdquo;El temor del Se&ntilde;or es el principio de la sabidur&iacute;a&rdquo; y la sabidur&iacute;a es la meta de la educaci&oacute;n.</p>', '<p><strong><span style="color: #800000;">Crear un centro de pensamiento cristiano.</span></strong></p>\r\n<blockquote>\r\n<ul>\r\n<li>Reuniones semanales para construir pensamiento cristiano en todas las &aacute;reas.</li>\r\n<li>Dar conferencias edificadoras, donde se ense&ntilde;a la sabidur&iacute;a de Dios en todas las ciencias.</li>\r\n<li>Ense&ntilde;ar los principios del Reino de Dios.</li>\r\n<li>Transmitir la importancia de la Responsabilidad Social Corporativa.</li>\r\n</ul>\r\n</blockquote>', '2011-06-10 16:24:11', 'Administrador Portal'),
('familia', 'Familia', 'Sara Carolina Jim&eacute;nez', '<p><img style="float: left; margin: 10px;" title="montana_familia" src="../imagenes/ic_monta%f1as-familia.png" alt="logo" width="185" height="266" />Dios form&oacute; al hombre y la mujer en orden para establecer la familia que refleje Su Gloria.&nbsp;Mostrar al mundo al Cristo restaurador de las familias.</p>', '<p><span style="color: #800000;"><strong>Crear una Universidad de la Familia.</strong></span></p>\r\n<blockquote>\r\n<ul>\r\n<li>Apoyar a las familias que tienen miembros en condici&oacute;n de discapacidad.</li>\r\n<li>Brindar consejer&iacute;as y acompa&ntilde;amientos para que las familias sigan construyendo riqueza en todas las &aacute;reas.</li>\r\n<li>Dar conferencias en las &aacute;reas espiritual, financiera, relacional, liderazgo, emprendimiento y salud.</li>\r\n</ul>\r\n</blockquote>', '2011-06-10 16:23:56', 'Administrador Portal'),
('gcye', 'Gobierno Civil y Estado', 'Gilberto Enrique Castilla Solano', '<p><img style="float: left; margin: 0px;" title="montana_gobierno" src="../imagenes/ic_monta%f1as-gobierno.png" alt="logo" width="185" height="266" />Dios le dio al hombre gobiernos para establecer libertades y l&iacute;mites. Debemos reflejar su amor y gentileza y su justicia recta en nuestro gobierno.</p>', '<p><span style="color: #800000;"><strong>Tener un Presidente que gobierne con el temor del Se&ntilde;or.</strong></span></p>\r\n<blockquote>\r\n<ul>\r\n<li>Capacitar desde la ni&ntilde;ez en hacer la pol&iacute;tica a la manera de Dios.</li>\r\n<li>Construir las bases de un liderazgo pol&iacute;tico lleno del Esp&iacute;ritu Santo.</li>\r\n<li>Ser consejeros de los l&iacute;deres actuales en la pol&iacute;tica.</li>\r\n<li>Ser voz de esperanza.</li>\r\n</ul>\r\n</blockquote>', '2011-06-10 16:23:32', 'Administrador Portal'),
('iglesia', 'Iglesia', 'Fernando Mendoza', '<p><img style="float: left; margin: 10px;" title="montana_iglesia" src="../imagenes/ic_monta%f1as-iglesia.png" alt="logo" width="185" height="266" />Dios nunca dio al hombre una religi&oacute;n, le dio la oportunidad de tener un relaci&oacute;n intima con su creador. Debemos mostrar en nuestras vidas Su presencia y poder.</p>', '<p><strong><span style="color: #800000;">El Reino de Dios establecido en la tierra.</span></strong></p>\r\n<blockquote>\r\n<ul>\r\n<li>Apoyar a la Iglesia en el desarrollo de su tarea.</li>\r\n<li>Ser aporte en fortalecer la unidad de la iglesia y las relaciones del cuerpo de liderazgo.</li>\r\n<li>Aportar elementos que ayuden a fortalecer la intimidad del hombre con Dios desde su lugar de trabajo y expansi&oacute;n del Reino de Dios.</li>\r\n</ul>\r\n</blockquote>', '2011-06-10 16:22:41', 'Administrador Portal'),
('medcomunica', 'Medios de Comunicaci&oacute;n', 'Cindy Pereira', '<p><img style="float: left; margin: 10px;" title="montana_comunicacion" src="../imagenes/ic_monta%f1as-comunicaciones.png" alt="logo" width="185" height="266" />Dios dio al hombre libertades para comunicar sus bendiciones, mostrando su misericordia, gentileza, amor, justicia y forma de Gobierno. Esto es importante hacerlo en los medios masivos de comunicaci&oacute;n, Radio, TV, Prensa, Internet, Revistas, etc.</p>', '<p><span style="color: #800000;"><strong>Construir un cluster de impacto en comunicaciones.</strong></span></p>\r\n<blockquote>\r\n<ul>\r\n<li>Desde la p&aacute;gina Web influenciar al mundo para actuar de manera que se muestre el amor de Dios.</li>\r\n<li>Publicar libros, revistas, etc.</li>\r\n<li>Ser voz prof&eacute;tica y de esperanza divina.</li>\r\n<li>Trascender los medios para impactar la juventud y las futuras generaciones creativamente.</li>\r\n</ul>\r\n</blockquote>', '2011-06-10 16:24:59', 'Administrador Portal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semillas`
--

DROP TABLE IF EXISTS `semillas`;
CREATE TABLE IF NOT EXISTS `semillas` (
  `ID_semilla` int(11) NOT NULL AUTO_INCREMENT,
  `Texto` varchar(850) COLLATE utf8_spanish_ci NOT NULL,
  `Ultima_actualizacion` datetime NOT NULL,
  `Usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_semilla`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Pequeñas Semillas de Libertad' AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `semillas`
--

INSERT INTO `semillas` (`ID_semilla`, `Texto`, `Ultima_actualizacion`, `Usuario`) VALUES
(1, '<p style="text-align: left;">&nbsp;<strong>Proverbios 1&nbsp;</strong></p>\r\n<p style="text-align: left;"><strong><sup id="es-RVC-16403" class="versenum">1</sup>Proverbios de Salom&oacute;n, hijo de David, rey de Israel.&nbsp;</strong><sup id="es-RVC-16404" class="versenum">2</sup> Para entender sabidur&iacute;a y doctrina, y conocer razones prudentes. <sup id="es-RVC-16405" class="versenum">3</sup> Para recibir prudentes consejos, y justicia, juicio y equidad.&nbsp; <sup id="es-RVC-16406" class="versenum">4</sup> Para dar sagacidad a los incautos, e inteligencia y cordura a los j&oacute;venes.&nbsp; <sup id="es-RVC-16407" class="versenum">5</sup> Que lo oiga el sabio, y aumente su saber, y que el entendido reciba consejo <sup id="es-RVC-16408" class="versenum">6</sup> para entender proverbios y enigmas.</p>', '2011-06-09 14:15:12', 'Administrador Portal'),
(2, '<p>&nbsp;</p>\r\n<p>PROVERBIOS 22</p>\r\n<p><sup>1</sup>M&aacute;s vale el buen nombre que las muchas riquezas,&nbsp;y el favor que la plata y el oro.<sup id="es-LBLA-17018" class="versenum">2</sup>El rico y el pobre tienen un lazo com&uacute;n:&nbsp;el que hizo a ambos es el SE&Ntilde;OR.</p>', '2011-06-09 14:16:48', 'Administrador Portal'),
(6, '<p>Proverbios 16</p>\r\n<p><sup id="es-DHH-18687" class="versenum">13</sup>&nbsp;Los reyes aman y ven con agrado&nbsp;a quien habla con honradez y sinceridad.</p>', '2011-06-09 14:18:03', 'Administrador Portal'),
(3, '<h4>Proverbios 21</h4>\r\n<h4><span class="Apple-style-span" style="font-weight: normal;"><sup>1</sup>Como canales de agua es el coraz&oacute;n del rey en la mano del SE&Ntilde;OR;&nbsp;El lo dirige donde le place.&nbsp;<sup id="es-LBLA-16987" class="versenum">2</sup>Todo camino del hombre es recto ante sus ojos,&nbsp;pero el SE&Ntilde;OR sondea los corazones.&nbsp;<sup id="es-LBLA-16988" class="versenum">3</sup>El hacer justicia y derecho&nbsp;es m&aacute;s deseado por el SE&Ntilde;OR que el sacrificio.</span></h4>', '2011-06-09 14:05:36', 'Administrador Portal'),
(4, '<p>Proverbios 23</p>\r\n<p><sup id="es-LBLA-17068" class="versenum">23</sup>Compra la verdad y no la vendas,&nbsp;adquiere sabidur&iacute;a, instrucci&oacute;n e inteligencia.</p>', '2011-06-09 14:10:14', 'Administrador Portal'),
(5, '<p>Proverbios 22</p>\r\n<p><sup id="es-RVR1995-17021" class="versenum">4</sup>&nbsp;Riquezas, honor y vida&nbsp;son el premio de la humildad y del temor de Jehov&aacute;.</p>', '2011-06-09 14:23:31', 'Administrador Portal'),
(7, '<p>Proverbios 15</p>\r\n<p><sup>7</sup> Los sabios esparcen sabidur&iacute;a con sus labios; los necios, con su mente, hacen todo lo contrario</p>', '2011-06-09 14:22:49', 'Administrador Portal'),
(8, '<p>Eclesiast&eacute;s 12</p>\r\n<p><sup id="es-DHH-19367" class="versenum">13</sup>&nbsp;El discurso ha terminado. Ya todo ha sido dicho. Honra a Dios y cumple sus mandamientos, porque eso es el todo del hombre.&nbsp;<sup id="es-DHH-19368" class="versenum">14</sup>&nbsp;Dios habr&aacute; de pedirnos cuentas de todos nuestros actos, sean buenos o malos, y aunque los hayamos hecho en secreto.</p>', '2011-06-09 14:20:20', 'Administrador Portal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `User_access` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Password_access` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `Creado` datetime NOT NULL,
  `Ingreso` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Nombres`, `Apellidos`, `User_access`, `Password_access`, `Creado`, `Ingreso`) VALUES
(1, 'Administrador', 'Portal', 'fsladmin', '096ac5e623c4a61fb61184252236b447', '2011-05-18 12:15:59', '2011-06-24 13:07:26');
COMMIT;

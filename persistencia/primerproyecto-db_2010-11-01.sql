-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-11-2010 a las 23:26:52
-- Versión del servidor: 5.0.41
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `primerproyecto`
--

CREATE DATABASE `primerproyecto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `primerproyecto`;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--
-- Creación: 29-10-2010 a las 00:02:07
-- Última actualización: 29-10-2010 a las 00:06:53
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL default 'fotos/defecto.jpg',
  `contra` varchar(32) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT DELAYED IGNORE INTO `administrador` (`codigo`, `nombre`, `apellido`, `correo`, `foto`, `contra`) VALUES
('100', 'Javier', 'Ospina', '10', 'fotos/defecto.jpg', 'f899139df5e1059396431415e770c6dd'),
('200', '20', '20', '20', 'fotos/defecto.jpg', '3644a684f98ea8fe223c713b77189a77'),
('300', '30', '30', '30', 'fotos/defecto.jpg', '94f6d7e04a4d452035300f18b984988c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--
-- Creación: 29-10-2010 a las 00:26:19
-- Última actualización: 29-10-2010 a las 00:30:01
--

DROP TABLE IF EXISTS `catalogo`;
CREATE TABLE IF NOT EXISTS `catalogo` (
  `id_producto` int(50) NOT NULL auto_increment,
  `producto` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY  (`id_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `catalogo`
--

INSERT DELAYED IGNORE INTO `catalogo` (`id_producto`, `producto`, `precio`) VALUES
(1, 'Papa', 50),
(2, 'Arroz', 20),
(3, 'Yuca', 10.3),
(4, 'Arracacha', 15.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 29-10-2010 a las 00:02:07
-- Última actualización: 29-10-2010 a las 00:23:41
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL default 'fotos/defecto.jpg',
  `contra` varchar(32) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT DELAYED IGNORE INTO `usuario` (`codigo`, `nombre`, `apellido`, `correo`, `foto`, `contra`) VALUES
('10', 'Luis', 'Melo', '10', 'fotos/defecto.jpg', '123456'),
('20', '20', '20', '20', 'fotos/defecto.jpg', '98f13708210194c475687be6106a3b84'),
('30', '30', '30', '30', 'fotos/defecto.jpg', '34173cb38f07f89ddbebc2ac9128303f'),
('40', '40', '40', '40', 'fotos/defecto.jpg', 'd645920e395fedad7bbbed0eca3fe2e0'),
('60', '60', '60', '60', 'fotos/60_Invierno.jpg', '072b030ba126b2f4b2374f342be9ed44'),
('70', '70', '70', '70', 'fotos/defecto.jpg', '7cbbc409ec990f19c78c75bd1e06f215'),
('80', '80', '80', '80', 'fotos/80_Colinas_azules.jpg', 'f033ab37c30201f73f142449d037028d'),
('90', '90', '90', '90', 'fotos/defecto.jpg', '8613985ec49eb8f757ae6439e879bb2a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

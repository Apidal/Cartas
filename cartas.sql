
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2018 a las 17:42:47
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u208080194_carta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos`
--

CREATE TABLE IF NOT EXISTS `objetos` (
  `nombre` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `comprado` tinyint(1) NOT NULL DEFAULT '0',
  `reservado` tinyint(1) NOT NULL DEFAULT '0',
  `esExtra` tinyint(1) NOT NULL DEFAULT '0',
  `escritorExtra` varchar(30) DEFAULT NULL,
  `personaUltimoCambio` varchar(30) DEFAULT NULL,
  `ultimoCambio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nombre`,`nick`),
  KEY `nick` (`nick`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nick` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`nick`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nick`, `password`) VALUES
('Alejandro', 'fe5fe4af3281ec07715498f052a7350c26c151c0'),
('Alex', 'ccffb2e4d96d9bfeb03a45b4a1e14bd389f4b039'),
('Carmen', '95e219e2b4b5581909b3645f5dfb05a118eec7f7'),
('JC', '495367fbce747c14ee6e0a91b9c525269771b0df'),
('María', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('Marina', '3196bbc5c4fdd885469d1b1c2b6a78fcad1656ed'),
('Martín', '601f1889667efaebb33b8c12572835da3f027f78'),
('Conchi', '9e4f2b495cee384b5bbfa70e2ff411609830564a'),
('Marisa', 'b9b43f7db1cc9e5d359aed8988391c8ea20c71bf'),
('Marta', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('Álvaro', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

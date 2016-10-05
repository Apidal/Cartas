-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2016 a las 21:51:28
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cartas`
--
CREATE DATABASE IF NOT EXISTS `cartas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cartas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos`
--

CREATE TABLE IF NOT EXISTS `objetos` (
  `nombre` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `ayuda` text NOT NULL,
  `comprado` tinyint(1) NOT NULL DEFAULT '0',
  `reservado` tinyint(1) NOT NULL DEFAULT '0',
  `esExtra` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nick` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `objetos`
--
ALTER TABLE `objetos`
 ADD PRIMARY KEY (`nombre`,`nick`), ADD KEY `nick` (`nick`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`nick`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `objetos`
--
ALTER TABLE `objetos`
ADD CONSTRAINT `objetos_ibfk_1` FOREIGN KEY (`nick`) REFERENCES `usuario` (`nick`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

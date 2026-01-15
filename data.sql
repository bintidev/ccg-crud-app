-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2026 a las 20:35:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_php`
--
DROP DATABASE IF EXISTS `login_php`;


CREATE DATABASE IF NOT EXISTS `login_php` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `login_php`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `admins` (
  `user` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `agentid` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `admins` (`user`, `agentid`, `password`, `last_name`, `name`) VALUES
(1, 'MK001', 'KureoMad0_!', 'Mado', 'Kureo');

--
-- Índices para tablas volcadas
--

--
-- Estructura de tabla para la tabla `ghouls`
--

CREATE TABLE `ghouls` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ghoulid` varchar(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rank` varchar(3) NOT NULL,
  `kagune` enum('Ukaku','Koukaku','Rinkaku','Bikaku') NOT NULL,
  `district` int(11) NOT NULL,
  `organization_member` tinyint(1) NOT NULL,
  `first_detected_activity` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ghouls`
--

INSERT INTO `ghouls` (`id`, `ghoulid`, `name`, `rank`, `kagune`, `district`, `organization_member`, `first_detected_activity`) VALUES
(1, 'PE-kk001', 'Patched Eye', 'SSS', 'Rinkaku', 20, 1, '2012-10-16');

--
-- Índices para tablas volcadas
--

-- CREATE USER 'login-php'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON *.* TO 'login-php'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 
--
-- Usuario con acceso a ambas BD
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

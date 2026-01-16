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

INSERT INTO `admins` (`agentid`, `password`, `last_name`, `name`) VALUES
('MK001', 'KureoMad0_!', 'Mado', 'Kureo'),
('TN219', '@tsuri-wLuV33', 'Nori', 'Tsuda');

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
  `rank` varchar(3),
  `kagune` enum('Ukaku','Koukaku','Rinkaku','Bikaku') NOT NULL,
  `district` int(11),
  `organization_member` tinyint(1) NOT NULL,
  `first_detected_activity` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ghouls`
--

INSERT INTO `ghouls` (`ghoulid`, `name`, `rank`, `kagune`, `ward`, `contained`, `first_detected_activity`) VALUES
('PE-kk001', 'Eyepatch', 'SSS', 'Rinkaku', 20, 0, '2012-10-16'),
('GM-ts012', 'Gourmet', 'SSS', 'Koukaku', 24, 0, '2004-04-02'),
('BD-ik008', 'Black Dog', 'SS', 'Ukaku', 20, 1, '1999-07-18'),
('RV-yr777', 'Raven', NULL, 'Rinkaku', 4, 0, '1998-08-01');

--
-- Índices para tablas volcadas
--


GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES, DELETE HISTORY ON *.* TO `login-php`@`localhost` IDENTIFIED BY PASSWORD '*2A80256C5318AF3140A37693CCD04CE699D8D947';

--
-- Usuario con acceso a ambas BD
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
